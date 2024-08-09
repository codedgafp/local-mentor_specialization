/**
 * Javascript containing function of the admin entities
 */

define([
    'jquery',
    'local_entities/local_entities',
    'local_mentor_core/select2',
    'local_mentor_core/mentor',
    'format_edadmin/format_edadmin',
    'jqueryui',
], function ($, local_entities, select2, mentor, format_edadmin) {

    local_entities.create_entity_modal = function (event, issubentity) {
        event.preventDefault();

        // Element list
        var inputspacenameid = issubentity ? 'sub-entities-form-name' : 'entities-form-name';
        var inputresponsible = issubentity ? 'entities-form-parent-entity' : 'entities-form-email-responsible';
        var inputreflocal = 'entities-form-ref-local-entity';
        var warningclass = 'entities-form-warning-none';
        var formtemplate = issubentity ? '#sub-entities-form-template' : '#entities-form-template';

        $('.entities-form-maxlength').addClass('entities-form-warning-none');

        // Modal params
        var buttons = [// Modal buttons
            {
                text: M.util.get_string('save', 'format_edadmin'),
                class: 'btn-primary',
                id: 'saveentityform',
                click: function () {
                    //If name space input is not empty
                    var serializeddata = issubentity ? $('#sub-entities-form').serialize() : $('#entities-form').serialize();
                    var modalthis = $(this);

                    var spacename = $('#' + inputspacenameid).val();

                    var maxlength = issubentity ? 70 : 200;
                    // Check entity name length.
                    if (spacename.length > maxlength) {
                        $('#saveentityform').attr("disabled", false);
                        $('.entities-form-maxlength').removeClass('entities-form-warning-none');
                        return;
                    } else {
                        $('.entities-form-maxlength').addClass('entities-form-warning-none');
                    }

                    var ajaxcallparams = {
                        url: M.cfg.wwwroot + '/local/entities/ajax/ajax.php?' + serializeddata,
                        controller: 'entity',
                        action: 'create_entity',
                        format: 'json',
                        callback: function (response) {
                    
                            response = JSON.parse(response);

                            if (response.success) {
                                modalthis.dialog('destroy');
                                M.table.ajax.reload();
                            } else {//If user not exist
                                $('#saveentityform').attr("disabled", false);
                                $(formtemplate + ' .entities-form-warning').removeClass(warningclass).html(response.message);
                            }
                        }
                    };

                    if (issubentity) {
                        if (
                            $('#' + inputresponsible).select2('data').length <= 0 ||
                            $('#sub-entities-form').serializeArray()[1].value === ""
                        ) {
                            $(formtemplate + ' .entities-form-warning')
                                .removeClass(warningclass)
                                .html(M.util.get_string('requiredfields', 'local_mentor_core'));
                            return;
                        }
                        // Check if sub entity name is empty.
                        if ($('#sub-entities-form-name').val().trim().length === 0) {
                            $(formtemplate + ' .entities-form-warning')
                                .removeClass(warningclass)
                                .html(M.util.get_string('requiredfields', 'local_mentor_core'));
                            return;
                        }

                        if ($('#' + inputreflocal).select2('data').length > 0) {
                            ajaxcallparams.reflocalid = $('#' + inputreflocal).select2('data')[0].id;
                        }

                        ajaxcallparams.parentid = $('#' + inputresponsible).select2('data')[0].id;
                    } else {

                        if (
                            $('#' + inputspacenameid).val().trim().length === 0 ||
                            $('#entities-form-shortname').val().trim().length === 0
                        ) {
                            $(formtemplate + ' .entities-form-warning')
                                .removeClass(warningclass)
                                .html(M.util.get_string('requiredfields', 'local_mentor_core'));
                            return;
                        }

                        ajaxcallparams.userid = 0;
                        if ($('#' + inputresponsible).select2('data').length > 0) {
                            ajaxcallparams.userid = $('#' + inputresponsible).select2('data')[0].id;
                        }
                    }

                    $('#saveentityform').attr("disabled", "disabled");
                    format_edadmin.ajax_call(ajaxcallparams);
                    $(formtemplate + ' .entities-form-warning').addClass(warningclass);
                }
            },
            {
                text: M.util.get_string('cancel', 'format_edadmin'),
                class: 'btn-secondary',
                click: function () {//Just close the modal
                    $(formtemplate + ' .entities-form-warning').addClass(warningclass);
                    $(this).dialog("destroy");
                }
            }
        ];

        // Display add entity dialog.
        mentor.dialog(formtemplate, {
            id: "testiddialog",
            width: 650,
            title: issubentity ?
                M.util.get_string('addsubentity', 'local_entities') :
                M.util.get_string('addentity', 'local_entities'),
            buttons: buttons,
            close: function () {
                $(formtemplate + ' .entities-form-warning').addClass(warningclass);
                $(this).dialog("destroy");
            },
            open: function () {
                $('#entities-form')[0].reset();
                $('#entities-form-regionid').select2();
                $('#' + inputresponsible).val(null).trigger("change");
                $('#' + inputspacenameid).val(null).trigger("change");
                $('#' + inputreflocal).val(null).trigger("change");
            }
        });

        // Manage entity manager dropdown list.
        if (issubentity) {
            $('#' + inputresponsible).select2({
                dropdownParent: $(formtemplate),
                ajax: {
                    url: M.cfg.wwwroot + '/local/entities/ajax/ajax.php',
                    dataType: 'json',
                    data: function (params) {
                        return {
                            controller: 'entity',
                            action: 'search_main_entities',
                            format: 'json',
                            searchtext: params.term
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: $.map(data.message, function (item) {
                                return {
                                    text: item.shortname,
                                    id: item.id
                                };
                            })
                        };
                    }
                }
            }).data('select2').$container.addClass("custom-select");

            $('#' + inputreflocal).select2({
                dropdownParent: $(formtemplate),
                ajax: {
                    url: M.cfg.wwwroot + '/local/entities/ajax/ajax.php',
                    dataType: 'json',
                    data: function (params) {
                        return {
                            controller: 'user',
                            action: 'search_users',
                            format: 'json',
                            searchtext: params.term
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: $.map(data.message, function (item) {
                                return {
                                    text: item.firstname + ' ' + item.lastname + ' - ' + item.email,
                                    id: item.id
                                };
                            })
                        };
                    }
                }
            }).data('select2').$container.addClass("custom-select");
        } else {
            $('#' + inputresponsible).select2({
                dropdownParent: $(formtemplate),
                ajax: {
                    url: M.cfg.wwwroot + '/local/entities/ajax/ajax.php',
                    dataType: 'json',
                    data: function (params) {
                        return {
                            controller: 'user',
                            action: 'search_users',
                            format: 'json',
                            searchtext: params.term
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: $.map(data.message, function (item) {
                                return {
                                    text: item.firstname + ' ' + item.lastname + ' - ' + item.email,
                                    id: item.id
                                };
                            })
                        };
                    }
                }
            }).data('select2').$container.addClass("custom-select");
        }
    };

    local_entities.set_default_entity_modal = function (event) {

        event.preventDefault();
        var inputresponsible = 'entities';
        
        // Modal params
        var buttons = [// Modal buttons
            {
                text: M.util.get_string('save', 'format_edadmin'),
                class: 'btn btn-primary',
                click: function () {
                    var modalthis = $(this);
                    
                    var serializeddata = $('#default-entity-form').serialize();
                    var ajaxcallparams = {
                        url: M.cfg.wwwroot + '/local/entities/ajax/ajax.php?' + serializeddata,
                        controller: 'entity',
                        action: 'update_default_entity',
                        format: 'json',
                        callback: function (response) {
                            modalthis.dialog('destroy');
                            response = JSON.parse(response);
                            if (response.success) {
                                M.table.ajax.reload();
                            } else {
                                format_edadmin.error_modal(response.message);
                            }
                        }
                    };
                    
                    format_edadmin.ajax_call(ajaxcallparams);
                }
            },
            {
                text: M.util.get_string('cancel', 'format_edadmin'),
                class: 'btn btn-secondary',
                click: function () {
                    $(this).dialog("destroy");
                }
            }
        ];

        let defaultentitytemplate = '#default-entity-form-template';

        mentor.dialog(defaultentitytemplate, {
            width: 620,
            title: M.util.get_string('setdefaultentity', 'local_entities'),
            buttons: buttons,
            close: function () {
                $(this).dialog("destroy");
            },
            open: function () {
                $('#default-entity-form')[0].reset();
    
                $.ajax({
                    url: M.cfg.wwwroot + '/local/entities/ajax/ajax.php',
                    dataType: 'json',
                    data: {
                        controller: 'entity',
                        action: 'get_default_entity',
                        format: 'json'
                    },
                    success: function (data) {
                        if (data.message && data.message.defaultentity) {
                            var defaultEntity = data.message.defaultentity;
                            var name = defaultEntity.idnumber ? defaultEntity.idnumber : defaultEntity.name
                            var newOption = new Option(name, defaultEntity.id, true, true);
                            $('#' + inputresponsible).append(newOption).trigger('change');
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error('Erreur lors de la récupération de l\'entité par défaut :', error);
                    }
                });
            }
        });
    

        $('#' + inputresponsible).select2({
            dropdownParent: $(defaultentitytemplate), 
            ajax: {
                url: M.cfg.wwwroot + '/local/entities/ajax/ajax.php',
                dataType: 'json',
                data: function (params) {
                    return {
                        controller: 'entity',
                        action: 'get_main_entities_with_default',
                        format: 'json',
                        searchtext: params.term
                    };
                },
                processResults: function (data) {
                    defaultEntity = data.message.defaultentity; 
                    var mainentities = $.map(data.message.mainentities, function (item) {
                        return {
                            text: item.shortname,
                            id: item.id
                        };
                    });
                    return {
                        results: mainentities
                    };
                }
            }
        }).data('select2').$container.addClass("custom-select");

    }

    /**
     * Entity admin form event.
     *
     * @param {bool} canBeMainEntity
     */
    local_entities.adminFormEvent = function (canBeMainEntity) {
        $('#contactpage').toggle(canBeMainEntity);
        // Init data.
        local_entities.canBeMainEntity = canBeMainEntity;
        local_entities.canBeMainEntityPopupTrigger = false;

        // Can be main entity data trigger change.
        $('#id_canbemainentity').on('change', function (e) {
            if (!local_entities.canBeMainEntity && e.currentTarget.checked) {
                local_entities.canBeMainEntityPopupTrigger = false;
                
            } else {
                local_entities.canBeMainEntityPopupTrigger = true;
            }
        
        });

        // Form submit trigger.
        $('.course-content > form').on('submit', function (e) {
            if (!local_entities.canBeMainEntityPopupTrigger || e.originalEvent.submitter.id !== 'id_submitbutton') return;
              
            e.preventDefault();

            // Init modal information.
            mentor.dialog(
                '<div style="white-space: pre-wrap">' +
                M.util.get_string('canbemainentity_popup_content', 'local_mentor_specialization') +
                '</div>',
                {
                    width: 700,
                    close: function () {
                        $(this).dialog("destroy");
                    },
                    title: M.util.get_string('warning', 'local_mentor_core'),
                    buttons: [
                        {
                            // Login page redirect.
                            text: M.util.get_string('yes', 'moodle'),
                            class: "btn btn-primary",
                            click: function () {
                                let formData = new FormData(e.target);
                                formData.set('hidden', 1);
                                for (var pair of formData.entries()) {
                                    console.log(pair[0]+ ': ' + pair[1]);
                                }
                                e.target.submit();
                            }
                        },
                        {
                            // Cancel button
                            text: M.util.get_string('cancel', 'moodle'),
                            class: "btn btn-secondary",
                            click: function () {
                                // Just close the modal.
                                $(this).dialog("destroy");
                            }
                        }]
            });
        });
    };

    return local_entities;
});
