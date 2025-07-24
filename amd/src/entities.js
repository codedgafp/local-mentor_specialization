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

    local_entities.delete_subentity_modal = async function (event) {
        $.ajax({
            url: M.cfg.wwwroot + '/local/entities/ajax/ajax.php',
            dataType: 'json',
            type:'GET',
            data: {
                    controller: 'entity',
                    action: 'search_main_entities',
                    format: 'json',
                    searchtext: ''
                }
            ,
            success: (mainEntitiesResponse) => {return create_delete_modal(mainEntitiesResponse, event)},
            error: (error) => (console.error('Error:', error))
        });    
    }

function create_delete_modal(mainEntitiesResponse, event){
        event.preventDefault();
        
        var inputentity = 'delete-subentity-form-entity';
        var inputsubentity = 'delete-subentity-form-subentity';
        var deletesubentityform = 'delete-subentity-form';
        var nonwarningclass = 'entities-form-warning-none';
        var warningclass = ' .entities-form-warning';
        var formtemplate = '#delete-subentity-form-template';
        var deleteentitybutton = 'deleteentitybutton';
        var deletesubentityformentitygroup = 'delete-subentity-form-entity-group';
        
        if(mainEntitiesResponse.message.length == 1){
            $('#' + inputentity).val(mainEntitiesResponse.message[0]?.id).trigger('change');
            $('#'+deletesubentityformentitygroup).hide();
            verifyExistanceDeletableSubEntities(mainEntitiesResponse.message[0]?.id, inputsubentity, deleteentitybutton, formtemplate, warningclass, nonwarningclass);
        }else if(mainEntitiesResponse.message.length < 1){
            return;
        }
        
        var buttons = [
            {
            text: M.util.get_string('delete', 'format_edadmin'),
            class: 'btn-primary',
            id: deleteentitybutton,
            click: function () {
                var modalthis = $(this);
                var serializeddata = $('#'+deletesubentityform).serialize();
                var ajaxcallparams = {
                    url: M.cfg.wwwroot + '/local/entities/ajax/ajax.php?' + serializeddata,
                    controller: 'entity',
                    action: 'delete_subentity',
                    format: 'json',
                    callback: function (response) {
                        response = JSON.parse(response);
                        modalthis.dialog("destroy");
                        if (response.success) {
                            confirm_subentity_delete(response.message);
                            M.table.ajax.reload();
                        } else {
                            format_edadmin.error_modal(response.message);                                
                        }
                    }
                };

                // Add entities ids
                ajaxcallparams.entityid = mainEntitiesResponse.message.length < 2 ? mainEntitiesResponse.message[0]?.id : $('#' + inputentity).select2('data')[0]?.id;
                ajaxcallparams.subentity = $('#' + inputsubentity).select2('data')[0]?.id;
                
                // Validators
                if(!ajaxcallparams.entityid || !ajaxcallparams.subentity ){
                    $(formtemplate + ' .entities-form-warning')
                                .removeClass(nonwarningclass)
                                .html(M.util.get_string('requiredfields', 'local_mentor_core'));
                    return;
                }
                
                // Ajax call for delete
                $('#'+deleteentitybutton).attr("disabled", "disabled");
                format_edadmin.ajax_call(ajaxcallparams);
                $(formtemplate + warningclass).addClass(nonwarningclass);
            }
        },
        {
            text: M.util.get_string('cancel', 'format_edadmin'),
            class: 'btn-secondary',
            click: function () {
                $(formtemplate + warningclass).addClass(nonwarningclass);
                $(this).dialog("destroy");
            }
        }
        ];

        mentor.dialog(formtemplate, {
            id: "deletesubentity",
            width: 650,
            title: M.util.get_string('deletesubentity', 'local_entities'),
            buttons: buttons,
            close: function () {
                $(formtemplate + warningclass).addClass(nonwarningclass);
                $(this).dialog("destroy");
            },
            open: function () {
                $('#'+deletesubentityform)[0].reset();
                $('#' + inputentity).val(null).trigger("change");
                $('#' + inputsubentity).val(null).trigger("change");
            }
        });

        // Manage entities dropdown list.
        $('#' + inputentity).select2({
            dropdownParent: $(formtemplate),
            ajax: {
                url: M.cfg.wwwroot + '/local/entities/ajax/ajax.php',
                dataType: 'json',
                data: function (params) {
                    return {
                        controller: 'entity',
                        action: 'search_main_entities',
                        format: 'json',
                        searchtext: params.term,
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

        // Manage subentities dropdown list.
        $('#' + inputsubentity).select2({
            dropdownParent: $(formtemplate),
            ajax: {
                url: M.cfg.wwwroot + '/local/entities/ajax/ajax.php',
                dataType: 'json',
                data: function (params) {
                    entityid = mainEntitiesResponse.message.length < 2 ? mainEntitiesResponse.message[0].id : $('#' + inputentity).select2('data')[0]?.id;
                        return {
                            controller: 'entity',
                            action: 'get_deletable_subentities',
                            format: 'json',
                            searchtext: params.term,
                            entityid: entityid
                        };
                },
                processResults: function (data) {
                    // Process the results from the AJAX response
                    var results = $.map(data.message, function (item) {
                        return {
                            text: item.name,
                            id: item.id
                        };
                    });
                    // Check if there's only one element, if so, set it as selected
                    if (results.length === 1) {
                        var singleOption = new Option(results[0].text, results[0].id, true, true);
                        $('#' + inputsubentity).append(singleOption).trigger('change');
                    }

                    return {
                        results: results
                    };
                }
            }
        }).data('select2').$container.addClass("custom-select");

        // Check if there is at least one deletable subentity
        $('#' + inputentity).on('change', () => {
            $('#delete-subentity-form-subentity').val(null).trigger('change');
            entityid = mainEntitiesResponse.message.length < 2 ? mainEntitiesResponse.message[0].id : $('#'+inputentity).val();
            return verifyExistanceDeletableSubEntities(entityid, inputsubentity, deleteentitybutton, formtemplate, warningclass, nonwarningclass);
        });
}

function verifyExistanceDeletableSubEntities(entityid,inputsubentity,deleteentitybutton, formtemplate, warningclass, nonwarningclass){
    $.ajax({
        url: M.cfg.wwwroot + '/local/entities/ajax/ajax.php',
        dataType: 'json',
        type:'GET',
        data: {
                controller: 'entity',
                action: 'get_deletable_subentities',
                format: 'json',
                searchtext: '',
                entityid : entityid
            }
        ,
        success: function(response) {
            if(response.message.length == 1){
                var singleOption = new Option(response.message[0].name, response.message[0].id, true, true);
                $('#'+inputsubentity).append(singleOption).trigger('change');
            }
            if(response.message.length < 1){
                $('#'+deleteentitybutton).attr("disabled", true);
                    $(formtemplate + warningclass).removeClass(nonwarningclass)
                    .html(M.util.get_string('nosubentitytodeletmessage', 'local_mentor_core'));
            }else{
                $('#'+deleteentitybutton).attr("disabled", false);
                    $(formtemplate + warningclass).addClass(nonwarningclass);
            }
        },
        error: function(error){
            console.error('Error:', error); 
        }
    });
}

function confirm_subentity_delete(message) {
    mentor.dialog(
        '<p class="text-center">' +message+ '</p>',
        {
            width: 550,
            title: M.util.get_string('confirmation', 'local_mentor_core'),
            buttons: [{
                text: M.util.get_string('close', 'local_mentor_core'),
                class: "btn btn-primary",
                click: function () {
                    $(this).dialog("close");
                }
            }]
        });
}

    /**
     * Entity admin form event.
     *
     * @param {bool} canBeMainEntity
     */
    local_entities.adminFormEvent = function (canBeMainEntity) {
        $('#contactpage').toggle(canBeMainEntity);
        $('#presentationpage').toggle(canBeMainEntity);
        $('#hidepresentationpage').toggle(canBeMainEntity);
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
