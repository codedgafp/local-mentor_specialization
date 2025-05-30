/**
 * Javascript containing function of the admin session
 */

define([
    'jquery',
    'format_edadmin/format_edadmin',
    'local_session/local_session',
    'local_mentor_core/select2',
    'local_mentor_core/cookie',
    'local_mentor_core/url',
    'core/templates',
    'jqueryui',
    'local_mentor_core/datatables',
    'local_mentor_core/datatables-buttons',
    'local_mentor_core/jszip',
    'local_mentor_core/buttons.html5',
    'local_mentor_specialization/common',
], function ($, format_edadmin, local_session, select2, cookie, url, templates) {

    let processing = false;

    /**
     * Create and init table and element's table
     *
     * @param {int} entityid
     */
    local_session.createAdminTable = function (entityid) {
        var that = this;

        that.cookieName = 'sessions_filter_entity_' + entityid;

        // Init select filter
        $('#filter-actions .custom-select').select2();
        that.subEntityId = url.getParam('subentityid');

        // Visual content data selector.
        $('#start-select, #end-select').on('change', function (e) {
            if (e.target.value === '') {
                $(e.target).removeClass('selected-data');
            } else {
                $(e.target).addClass('selected-data');
            }
        });

        // Filter data
        that.initFilterData();

        // Intialize filter event
        $('#filter-apply').click(function () {
            // Set data filter
            that.applyFilter();
        });

        // Reset filter event
        $("#filter-reset").click(function () {
            that.resetFilters();
        });

        $('#start-select').focusout(function () {
            $('#end-select').attr('min', $('#start-select').val());
            if (Date.parse($('#start-select').val()) > Date.parse($('#end-select').val())) {
                $('#end-select').val($('#start-select').val());
                that.filter.enddate = $('#start-select').val();
            }
        });

        $('#end-select').focusout(function () {
            $('#start-select').attr('max', $('#end-select').val());
            if (Date.parse($('#start-select').val()) > Date.parse($('#end-select').val())) {
                $('#start-select').val($('#end-select').val());
                that.filter.startdate = $('#end-select').val();
            }
        });

        function newexportaction(e, dt, button, config) {
            var self = this;
            var oldStart = dt.settings()[0]._iDisplayStart;
            dt.one('preXhr', function (e, s, data) {
                // Just this once, load all data from the server...
                data.start = 0;
                data.length = 2147483647;
                dt.one('preDraw', function (e, settings) {
                    // Call the original action function
                    if (button[0].className.indexOf('buttons-copy') >= 0) {
                        $.fn.dataTable.ext.buttons.copyHtml5.action.call(self, e, dt, button, config);
                    } else if (button[0].className.indexOf('buttons-excel') >= 0) {
                        $.fn.dataTable.ext.buttons.excelHtml5.available(dt, config) ?
                            $.fn.dataTable.ext.buttons.excelHtml5.action.call(self, e, dt, button, config) :
                            $.fn.dataTable.ext.buttons.excelFlash.action.call(self, e, dt, button, config);
                    } else if (button[0].className.indexOf('buttons-csv') >= 0) {
                        $.fn.dataTable.ext.buttons.csvHtml5.available(dt, config) ?
                            $.fn.dataTable.ext.buttons.csvHtml5.action.call(self, e, dt, button, config) :
                            $.fn.dataTable.ext.buttons.csvFlash.action.call(self, e, dt, button, config);
                    } else if (button[0].className.indexOf('buttons-pdf') >= 0) {
                        $.fn.dataTable.ext.buttons.pdfHtml5.available(dt, config) ?
                            $.fn.dataTable.ext.buttons.pdfHtml5.action.call(self, e, dt, button, config) :
                            $.fn.dataTable.ext.buttons.pdfFlash.action.call(self, e, dt, button, config);
                    } else if (button[0].className.indexOf('buttons-print') >= 0) {
                        $.fn.dataTable.ext.buttons.print.action(e, dt, button, config);
                    }
                    dt.one('preXhr', function (e, s, data) {
                        // DataTables thinks the first item displayed is index 0, but we're not drawing that.
                        // Set the property to what it was before exporting.
                        settings._iDisplayStart = oldStart;
                        data.start = oldStart;
                    });
                    // Reload the grid with the original page. Otherwise, API functions like table.cell(this) don't work properly.
                    setTimeout(dt.ajax.reload, 0);
                    // Prevent rendering of the full data to the DOM
                    return false;
                });
            });
            // Requery the server with the new one-time export settings
            dt.ajax.reload();
        };

        var tableButtons = [];

        if (this.params.exportcatalogpdf) {
            // Add export catalog PDF button.
            tableButtons.push({
                text: 'Export PDF offre',
                className: 'btn btn-secondary csvcatalog',
                action: function () {
                    window.open(M.cfg.wwwroot + '/local/catalog/pages/export.php?entityid=' + entityid, '_blank').focus();
                }
            });
        }

        if (this.params.exportcatalogcsv) {
            // Add export catalog button.
            tableButtons.push({
                text: 'Export CSV offre',
                className: 'btn btn-secondary csvcatalog',
                action: function () {
                    $.ajax({
                        url: M.cfg.wwwroot + '/local/session/ajax/ajax.php',
                        data: {
                            entityid: entityid,
                            action: 'get_available_sessions_csv_data',
                            controller: 'session',
                            format: 'json'
                        },
                    }).done(function (response) {
                        response = JSON.parse(response);
                        if (response.success) {
                            var csv = '';
                            var csvFile;
                            var downloadLink;

                            response.message.forEach(function (row) {
                                csv += row.join(';');
                                csv += "\n";
                            });

                            var dateobject = new Date();
                            var dateformat = dateobject.getFullYear() + '-' + ('0' + (dateobject.getMonth() + 1)).slice(-2) + '-' + ('0' + dateobject.getDate()).slice(-2);

                            var BOM = "\uFEFF";
                            var csvData = BOM + csv;

                            //define the file type to text/csv
                            csvFile = new Blob([csvData], { type: 'text/csv' });
                            downloadLink = document.createElement("a");
                            downloadLink.download = 'export_offre_formation_' + that.params.mainentityshortname + '_' + dateformat + '.csv';
                            downloadLink.href = window.URL.createObjectURL(csvFile);
                            downloadLink.style.display = "none";

                            document.body.appendChild(downloadLink);
                            downloadLink.click();
                        }
                    });
                }
            });
        }

        // Add export table button.
        tableButtons.push(
            {
                extend: 'csvHtml5',
                charset: 'utf-8',
                fieldBoundary: '',
                fieldSeparator: ';',
                bom: true,
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5, 6, 7, 8],
                    format: {
                        body: function (data, row, column, node) {

                            // Replace br by \r\n.
                            if (column === 1) {
                                return decodeURIComponent(data.replace(/<br\s*\/?>/ig, "."));
                            }
                            // Unescape session libelle.
                            if (column === 3) {
                                data = $(data).text();
                                return unescape(data);
                            }
                            return decodeURIComponent(data.replace(/<.*?>/ig, ""));
                        }
                    }
                },
                stripNewlines: false,
                text: 'Export CSV',
                className: 'btn btn-secondary csvexport',
                action: newexportaction
            });

        // Admin training table creation
        M.table = $('#session-table').DataTable({
            "columnDefs": [{
                "targets": 'no-sort',
                "orderable": false,
            }],
            processing: true,
            pageLength: 50,
            dom: 'Blfrtip',
            order: [],
            language: { search: ""},
            search: {return: true},
            oSearch: {
                "sSearch": (this.params.filtertrainingname) ? '"' + this.params.filtertrainingname + '"' : that.filter.search
            },
            fnDrawCallback: function () {
                if (processing === false) {

                    processing = true;

                    $.ajax({
                        url: M.cfg.wwwroot + '/local/entities/ajax/ajax.php',
                        data: {
                            entityid: entityid,
                            action: 'has_sub_entities',
                            controller: 'entity',
                            format: 'json'
                        },
                    }).done(function (response) {
                        response = JSON.parse(response);
                        if (response.message) {
                            // If has sus-entity
                            $('.subentity-data').css({ 'display': 'table-cell' });
                            $('.header-subentity').css({ 'display': 'table-cell' });
                            $('#sub-entity-filter').css({ 'display': 'flex' });
                        } else {
                            // If has not sus-entity
                            $('.subentity-data').css({ 'display': 'none' });
                            $('.header-subentity').css({ 'display': 'none' });
                            $('#sub-entity-filter').css({ 'display': 'none' });
                        }

                        processing = false;
                    });
                }
            },
            buttons: tableButtons,
            serverSide: true,//For use Ajax
            ordering: true,
            ajax: {
                //Call edadmin course list
                url: M.cfg.wwwroot + '/local/session/ajax/ajax.php',
                data: function (d) {// GET HTTP data setting
                    d.controller = 'session';
                    d.action = 'get_sessions_by_entity';
                    d.format = 'json';
                    d.entityid = entityid;
                    d.filter = that.filter; // Filters data
                },
            },
            oLanguage: {
                sUrl: M.cfg.wwwroot + '/local/mentor_core/datatables/lang/' + M.util.get_string('langfile', 'local_session') + ".json"
            },
            rowCallback: function (row, data) {
                that.actionsRenderPromise(data)
                    .then(function (menuData) {
                        templates
                            .renderForPromise('local_mentor_core/custom_menu', menuData)
                            .then(function (_ref) {
                                $('td.action-admin-session', row).html(_ref.html);
                            });
                    });
            },
            columns: [
                {
                    className: 'subentity-data',
                    data: 'subentityname'
                },
                {
                    className: 'collection-data',
                    data: 'collectionstr'
                },
                {
                    className: 'training-name-data',
                    data: 'trainingfullname'
                },
                {
                    className: 'session-name-data',
                    data: function (data, type, row, meta) {

                        if (type === 'display') {
                            return '<a href="' + data.link + '" title="' + M.util.get_string('wordingsession', 'local_session', data.sessionname) + '" target="_blank">' + data.shortname + '</a>';
                        }
                        return data.shortname;
                    }
                },
                {
                    className: 'session-number-data',
                    data: 'sessionnumber'
                },
                {
                    className: 'session-timecreated-data',
                    data: function (data, type, row, meta) {

                        if (data.timecreated == 0 || data.timecreated === null) {
                            return '';
                        }
                        if (type === 'display') {
                            return local_session.getDateTimeFromTimestamp(data.timecreated);
                        }
                        return data.timecreated;
                    }
                },
                {
                    className: 'centered session-nbparticipant-data',
                    data: function (data, type, row, meta) {
                        if (type === 'display') {
                            var color = '#1E1E1E';

                            if (data.maxparticipants != null && data.maxparticipants != '' && data.maxparticipants != 0) {
                                var percent = data.nbparticipant / data.maxparticipants * 100;

                                if (percent >= 100) {
                                    color = '#E10600';
                                } else if (percent >= 90) {
                                    color = '#BF7330';
                                }
                            }
                            return '<span style="color: ' + color + ';">' + data.nbparticipant + '</span>';
                        }
                        return data.nbparticipant;
                    },
                },
                {
                    className: 'centered session-opento-data hidden',
                    data: function (data, type, row, meta) {
                        return data.opento;
                    },
                },
                {
                    className: 'session-status-data',
                    sortable: false,
                    data: function (data, type, row, meta) {
                        return '<span class="session-status" data-status="' + data.statusshortname + '">' + data.status + '</span>';
                    }
                },
                {
                    className: 'action-admin-session',
                    width: '90px',
                    data: function (data, type, row, meta) {
                        if (type === 'display') {
                            return '';
                        }
                        return '';
                    }
                }
            ],
            initComplete: () => { addSearchButton("session-table_filter") }
        });
        M.table.on('search.dt', function () {
            that.setSearchCookieFilter();
        });

        M.table.on('processing.dt', function(e, settings, processing) {
            if (processing) {
                $(M.table.table().container()).addClass('processing');
            } else {
                $(M.table.table().container()).removeClass('processing');
            }
        });

        $(document).on('click', '#session-table thead th', function(e) {
            if ($(M.table.table().container()).hasClass('processing')) {
                e.stopPropagation();
                e.preventDefault();
            }
        });
    }

    /**
     * Init filter's table data
     */
    local_session.initFilterData = function () {
        $cookieDateFilter = JSON.parse(cookie.read(this.cookieName));

        if (this.subEntityId) {
            if ($cookieDateFilter) {
                $cookieDateFilter.subentity = [this.subEntityId];
            } else {
                $cookieDateFilter = {
                    subentity: [this.subEntityId],
                    collection: [],
                    opento: [],
                    status: [],
                    startdate: '',
                    enddate: '',
                    search: ''
                };
            }
        }

        if ($cookieDateFilter) {
            this.filter = $cookieDateFilter;
            $('#sub-entity-select').val(this.filter.subentity).trigger('change');
            $('#collection-select').val(this.filter.collection).trigger('change');
            $('#opento-select').val(this.filter.opento).trigger('change');
            $('#status-select').val(this.filter.status).trigger('change');
            $('#start-select').val(this.filter.startdate).trigger('change');
            $('#end-select').val(this.filter.enddate).trigger('change');
            this.filter.startdate = this.filter.startdate ? (Date.parse(this.filter.startdate) / 1000) - 86400 : '';
            this.filter.enddate = this.filter.enddate ? Date.parse(this.filter.enddate) / 1000 : '';
            return;
        }

        this.filter = {
            subentity: '',
            collection: '',
            opento: '',
            status: '',
            startdate: '',
            enddate: '',
            search: ''
        };
    };

    /**
     * Apply new data filter to table and set data to cookie's filter data
     */
    local_session.applyFilter = function () {

        var subEntitySelect = $('#sub-entity-select').val();

        if (subEntitySelect.length === 1) {
            if (subEntitySelect[0] !== this.subEntityId) {
                this.initParams();
            }
        } else {
            this.initParams();
        }

        // Set data filter
        this.filter.subentity = subEntitySelect;
        this.filter.collection = $('#collection-select').val();
        this.filter.opento = $('#opento-select').val();
        this.filter.status = $('#status-select').val();
        this.filter.startdate = $('#start-select').val();
        this.filter.enddate = $('#end-select').val();
        cookie.create(this.cookieName, JSON.stringify(this.filter));
        this.filter.startdate = $('#start-select').val() ? (Date.parse($('#start-select').val()) / 1000) - 86400 : '';
        this.filter.enddate = $('#end-select').val() ? Date.parse($('#end-select').val()) / 1000 : '';
        M.table.ajax.reload();
    };

    /**
     * Set search data to cookie's filter
     */
    local_session.setSearchCookieFilter = function () {
        cookieData = JSON.parse(cookie.read(this.cookieName));

        if (!(cookieData || M.table.search())) {
            return;
        }

        if (!cookieData) {
            cookieData = {
                subentity: '',
                collection: '',
                opento: '',
                status: '',
                startdate: '',
                enddate: '',
                search: ''
            };
            cookie.create(this.cookieName, JSON.stringify(cookieData));
            return;
        }

        this.filter.search = M.table.search();
        cookieData.search = this.filter.search;
        cookie.create(this.cookieName, JSON.stringify(cookieData));
    };

    /**
     * Initialize parameters
     */
    local_session.initParams = function () {
        // Initialize url params
        url.removeParam('subentityid');

        // Initialize subEntityId param
        this.subEntityId = false;
    };

    /**
     * Reset filters
     */
    local_session.resetFilters = function () {
        var that = this;
        if (that.subEntityId) {
            that.initParams();
        }
        $('#filter-actions .custom-select').val(null).trigger('change');
        $('#opento-select').val('').trigger('change');
        $('#start-select').val('').trigger('change');
        $('#end-select').val('').trigger('change');
        M.table.search('');
        that.applyFilter();
        that.setSearchCookieFilter();
    };

    /**
     * Create Promise to rendering of the action buttons
     *
     * @param {Object} data
     * @returns {Promise}
     */
    local_session.actionsRenderPromise = function (data) {

        return new Promise(function (resolve, reject) {

            var menuData = {};
            menuData.id = data.id;
            menuData.items = [];

            var nbrActions = Object.keys(data.actions).length;

            $.each(data.actions, function (index, element) {
                var item = {};
                switch (index) {
                    case 'sessionSheet':
                        item = {
                            'id': index + data.id,
                            'href': element.url,
                            'text': '<img src="' + M.util.image_url(index.toLowerCase(), 'local_session') + '"> ' + element.tooltip
                        };
                        break;
                    case 'moveSession':
                        item = {
                            'id': index + data.id,
                            'class': 'cursor-image-session-admin-session',
                            'onclick': 'local_session.moveSession(' + data.id + ')',
                            'text': '<img src="' + M.util.image_url(index.toLowerCase(), 'local_session') + '"> ' + element.tooltip
                        };
                        break;
                    case 'deleteSession':
                        item = {
                            'id': index + data.id,
                            'class': 'cursor-image-session-admin-session',
                            'onclick': 'local_session.deleteSession(' + data.id + ')',
                            'text': '<img src="' + M.util.image_url(index.toLowerCase(), 'local_session') + '"> ' + element.tooltip
                        };
                        break;
                    case 'manageUser':
                        item = {
                            'id': index + data.id,
                            'href': element.url,
                            'text': '<img src="' + M.util.image_url(index.toLowerCase(), 'local_session') + '"> ' + element.tooltip,
                            'target': '_blank'
                        };
                        break;
                    case 'importUsers':
                        item = {
                            'id': index + data.id,
                            'href': element.url,
                            'text': '<img src="' + M.util.image_url('importusers', 'local_session') + '"> ' + element.tooltip
                        };
                        break;
                    case 'importSIRH':
                        item = {
                            'id': index + data.id,
                            'href': element.url,
                            'text': '<img src="' + M.util.image_url('handshake', 'local_session') + '"> ' + element.tooltip
                        };
                        break;
                    case 'cancelSession':
                        // Escape the shortname string.
                        data.shortname = escape(data.shortname);
                        item = {
                            'id': index + data.id,
                            'class': 'cursor-image-session-admin-session',
                            'onclick': 'local_session.cancelSession(' + data.id + ',' + '\'' + data.shortname + '\')',
                            'text': '<img src="' + M.util.image_url(index.toLowerCase(), 'local_session') + '"> ' + element.tooltip
                        };
                        break;
                    default:
                        item = {
                            'id': index + data.id,
                            'href': element,
                            'text': '<img src="' + M.util.image_url(index.toLowerCase(), 'local_session') + '"> ' + index
                        };
                        break;
                }

                menuData.items.push(item);

                if (menuData.items.length === nbrActions) {
                    resolve(menuData);
                }
            });
        });
    };

    return local_session;
});
