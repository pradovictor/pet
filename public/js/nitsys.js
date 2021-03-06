var Nitsys = {
    parseConfirmPopUp: function (message, confirmAction, confirmData, scObj) {
        var modal = `
            <div class="modal-dialog modal-sm">
                <div id="confirm-modal-content" class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Confirme sua ação</h4>
                        <button type="button" class="close" onclick="Nitsys.removeConfirmPopUp();"><span>&times;</span></button>
                    </div>
                    <div id="confirm-modal-body" class="modal-body">
                        <p id="text-confirm">` + message + `</p>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-default action" type="button" onclick="Nitsys.removeConfirmPopUp();">Não</button>
                        <button id="confirm-removal-` + confirmData + `" class="btn btn-danger action" type="button">Sim</button>
                    </div>
                </div>
            </div>`;
        $(document).on('click', '#confirm-removal-' + confirmData, function () {
            confirmAction(confirmData, scObj);
        });
        $('#confirm-modal').html(modal);
        $('#confirm-modal').modal('show');
    },
    removeConfirmPopUp: function () {
        $('#confirm-modal').modal('hide');
        $("#confirm-modal").html('');
    },
    populateForm: function (idForm, response) {
        // reset form values from json object
        $.each(response, function (name, val) {
            var $el = $('#' + idForm + ' [name="' + name + '"]'),
                type = $el.attr('type');

            $('#' + idForm + ' select[name="' + name + '"] option[value="' + val + '"]').attr('selected', 'selected');

            switch (type) {
                case 'checkbox':
                    $el.attr('checked', 'checked');
                    break;
                case 'radio':
                    $el.filter('[value="' + val + '"]').attr('checked', 'checked');
                    break;
                default:
                    $el.val(val);
            }
        });
    },
    hideInPageForm: function () {
        $('#form-container').removeClass().addClass('fadeOut animated').one(
            'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend',
            function () {
                $.each($("#form-container").find('form'), function (index, elemento) {
                    if ($(elemento).parsley()) {
                        $(elemento).parsley().reset();
                    }
                });
                $(this).addClass('d-none');
                $('#add-autocomplete').removeClass('d-none');
            });
        Nitsys.clearForm('form-container');
    },
    hideInPageView: function () {
        $('#view-container').removeClass().addClass('fadeOut animated').one(
            'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend',
            function () {
                $(this).addClass('d-none');
            });
    },
    populateData: function (response) {
        $.each(response, function (name, val) {
            $('span#' + name).html(val);
        });
    },
    clearForm: function (idForm) {
        // reset form values from json object
        $('#' + idForm).find("input[type=text], input[type=hidden], textarea").val("");
        $('#' + idForm).find("radio, checkbox").prop("checked", false);
        // $('#' + idForm).find("select").prop("selected").val(""); 
    },
    saveForm: function (formId, simpleCRUD, stayOnPage, callback) {
        if (simpleCRUD) {
            $('#saveform-' + simpleCRUD.options.dataTables.container).attr('disabled', true);
        }
        var queryString = {
            "_token": $('meta[name=csrf-token]').attr("content")
        };
        $.each($('#' + formId).find("input[type=text], input[type=hidden], textarea, select"), function (key, input) {
            queryString[input.name] = input.value;
        });
        $.each($('#' + formId).find("input[type=checkbox]"), function (key, input) {
            if ($(input).prop("checked") === true) {
                queryString[input.name] = queryString[input.name] || [];
                queryString[input.name].push(input.value);
            }
        });
        $.ajax({
            url: $('#' + formId).attr('action'),
            method: $('#' + formId).attr('method'),
            data: queryString,
            success: function (response) {
                var result = (response ? eval(response) : {});
                if (simpleCRUD && ("modal" == simpleCRUD.options.dataTables.editType || "modal" === simpleCRUD.options.dataTables.addType)) {
                    $("#form-modal-" + simpleCRUD.options.dataTables.container).modal('hide');
                    simpleCRUD.dataTablesObj.ajax.reload();
                } else if (simpleCRUD && ("inPage" == simpleCRUD.options.dataTables.editType || "inPage" === simpleCRUD.options.dataTables.addType)) {
                    if ($('#form-container').css('display') == 'none' || $('#form-container').css("visibility") == "hidden") {
                        simpleCRUD.loadEditForm(result.id, simpleCRUD.options);
                    } else {
                        Nitsys.hideInPageForm();
                    }
                    simpleCRUD.dataTablesObj.ajax.reload();
                } else if (!stayOnPage && simpleCRUD && "redirect" == simpleCRUD.options.dataTables.editType) {
                    history.back(-1);
                } else {
                    $("#" + formId).append('<div id="form-save-response" class="alert alert-success return-alert">Registro salvo com sucesso!</div>');
                    setTimeout(function () {
                        $('#form-save-response').remove();
                    }, 2000);
                }
                if (simpleCRUD) {
                    $('#saveform-' + simpleCRUD.options.dataTables.container).attr('disabled', false);
                }
                if (callback) {
                    callback();
                }
            },
            error: function (err) {
                if (err.responseJSON.errors) {
                    $.each(err.responseJSON.errors, function (field, message) {
                        $("input[name='" + field + "']").addClass('parsley-error');
                        $('<ul class="parsley-errors-list filled" id="parsley-id-5"><li class="parsley-maxlength">' + message + '</li></ul>').insertAfter("input[name='" + field + "']");
                    });
                } else {
                    $("#" + formId).append('<div id="form-save-response" class="alert alert-danger return-alert">Registro não pode ser salvo! Tente novamente mais tarde.</div>');
                    setTimeout(function () {
                        $('#form-save-response').remove();
                    }, 5000);
                }
                $('#saveform-' + simpleCRUD.options.dataTables.container).attr('disabled', false);
                if (callback) {
                    callback();
                }
            }
        });
    },
    saveFile: function (formId, simpleCRUDObj) {
        var myForm = document.getElementById(formId);
        $.ajax({
            method: $('#' + formId).attr('method'),
            url: $('#' + formId).attr('action'),
            data: new FormData(myForm),
            processData: false,
            contentType: false,
            success: function (data) {
                $('#filename').val(data);
                if (simpleCRUDObj) {
                    simpleCRUDObj.dataTablesObj.ajax.reload();
                }
                $('#'+formId).parents('.form-container-file').addClass('d-none');
            },
            error: function (error) {
                console.log(error);
            }
        })
    },
    checkCEP: function (cep) {
        $.ajax({
            url: 'https://viacep.com.br/ws/' + cep.replace('-', '') + '/json/',
            method: 'GET',
            success: function (response) {
                $('#endereco').val(response.logradouro);
                $('#cidade').val(response.localidade);
                $('#estado').val(response.uf.toLowerCase());
                $('#bairro').val(response.bairro);
            }
        });
    }
}

var SimpleCRUD = {

    options: {},
    dataTablesObj: null,

    load: function (options) {
        var scObj = new Object();
        scObj.options = options;
        scObj.options.dataTables.columns.sort(function (a, b) {
            if (a.order < b.order) {
                return -1;
            } else if (a.order > b.order) {
                return 1;
            } else {
                return 0;
            }
        });
        scObj.parseDataTables = SimpleCRUD.parseDataTables;
        scObj.loadEditForm = SimpleCRUD.loadEditForm;
        scObj.loadViewForm = SimpleCRUD.loadViewForm;
        scObj.deleteCallback = SimpleCRUD.deleteCallback;
        scObj.parseFilterFooterActions = SimpleCRUD.parseFilterFooterActions;
        scObj.parseAddButton = SimpleCRUD.parseAddButton;
        scObj.parseTable = SimpleCRUD.parseTable;
        scObj.getDataTablesLanguage = SimpleCRUD.getDataTablesLanguage;
        scObj.getDataTablesButtons = SimpleCRUD.getDataTablesButtons;
        scObj.getDataTablesColumns = SimpleCRUD.getDataTablesColumns;
        scObj.parseTable();
        scObj.parseDataTables();
        scObj.parseFilterFooterActions();
        return scObj;
    },
    parseDataTables: function () {
        var options = this.options;
        var scObj = this;
        this.dataTablesObj = $('#lista-' + options.dataTables.container).DataTable({
            bProcessing: true,
            responsive: true,
            scrollX: true,
            dom: "<'row custom-datatables-filter'<'col-12 col-lg-6'B><'col-12 col-lg-6'f>>" + "<'row'<'col-sm-12'tr>>" + "<'row my-2'<'col-12 col-md-6 col-lg-2 col-xl-3'l><'col-12 col-md-6 col-lg-2 col-xl-3'i><'col-12 col-lg-8 col-xl-6'p>>",
            language: this.getDataTablesLanguage(),
            buttons: this.getDataTablesButtons(),
            lengthMenu: [
                [10, 25, 50, -1],
                ['10', '25', '50', 'todos']
            ],
            ajax: {
                url: options.dataTables.urls.list,
                type: "GET",
                dataSrc: "",
                data: function (d) {
                    if (options.dataTables.externalFilter) {
                        var obj = options.dataTables.externalFilter;
                        var keys = Object.keys(obj)
                        for (var i = 0; i < keys.length; i++) {
                            var property = keys[i];
                            d[property] = $('#' + obj[property]).val();
                        }
                    }
                }
            },
            initComplete: function (settings, json) {
                $(document).off('click', '.delete-' + options.dataTables.container);
                $(document).on('click', '.delete-' + options.dataTables.container, function () {
                    var name = $(this).attr('data-name');
                    var id = $(this).attr('data-id');
                    if (undefined !== id) {
                        Nitsys.parseConfirmPopUp('Você gostaria de apagar o registro: ' + name, scObj.deleteCallback, id, scObj);
                    }
                });
                $(document).off('click', '.edit-' + options.dataTables.container);
                $(document).on('click', '.edit-' + options.dataTables.container, function () {
                    var id = $(this).attr('data-id');
                    SimpleCRUD.loadEditForm(id, options);
                });
                $(document).off('click', '.view-' + options.dataTables.container);
                $(document).on('click', '.view-' + options.dataTables.container, function () {
                    var id = $(this).attr('data-id');
                    SimpleCRUD.loadViewForm(id, options);
                });
                $(document).off('click', '.botaoinpage-' + options.dataTables.container);
                $(document).on('click', '.botaoinpage-' + options.dataTables.container, function () {
                    if (options.dataTables.inPageCallback) {
                        var id = $(this).attr('data-id');
                        var name = $(this).attr('data-name');
                        window[options.dataTables.inPageCallback](id, name);
                    }
                });

                if ("modal" == options.dataTables.editType || "inPage" == options.dataTables.editType || "modal" == options.dataTables.addType) {
                    $(document).off('click', '#saveform-' + options.dataTables.container);
                    $(document).on('click', '#saveform-' + options.dataTables.container, function () {
                        // valida o conteudo do formulario - cada campo
                        $('#' + options.dataTables.formEntity).parsley().validate();
                    });
                }

                $('[data-toggle="tooltip"]').tooltip();
                body_sizer();
            },
            columns: this.getDataTablesColumns()
        });
    },
    loadAddForm: function (options) {
        Nitsys.clearForm(options.dataTables.formEntity);
        if ("inPage" == options.dataTables.addType) {
            //Show form to add new element
            $('#form-container').removeClass().addClass(
                'fadeInDown animated').one(
                'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend',
                function () {
                    $(this).removeClass();
                });
            $('body, html').animate({
                scrollTop: $('#master-panel').offset().top
            });
        } else if ("modal" == options.dataTables.addType) {
            $('#form-modal-' + options.dataTables.container).modal('show');
        } else if ("none" == options.dataTables.addType) {
            $('#form-modal-' + options.dataTables.container).modal('show');
        }
        //Show form to add new element
        // $('#form-container').removeClass().addClass(
        //     'fadeInDown animated').one(
        //     'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend',
        // function () {
        //     $(this).removeClass();
        // });
        // $('body, html').animate({
        //     scrollTop: $('#master-panel').offset().top
        // });

    },
    loadEditForm: function (id, options) {
        Nitsys.clearForm(options.dataTables.formEntity);
        if ('none' !== options.dataTables.editType) {
            if ("modal" == options.dataTables.editType) {
                $.ajax({
                    url: options.dataTables.urls.edit + id,
                    method: 'GET',
                    data: {
                        "_token": $('meta[name=csrf-token]').attr("content")
                    },
                    success: function (response) {
                        Nitsys.populateForm(options.dataTables.formEntity, response);
                        $('#form-modal-' + options.dataTables.container).modal('show');
                    }
                });
            } else if ("inPage" === options.dataTables.editType) {
                if (options.dataTables.addType === "autoComplete") {
                    $('#add-autocomplete').addClass('d-none');
                }
                if (id) {
                    //getting info for edit entry
                    $.ajax({
                        url: options.dataTables.urls.edit + id,
                        method: 'GET',
                        data: {
                            "_token": $('meta[name=csrf-token]').attr("content")
                        },
                        success: function (response) {
                            Nitsys.populateForm(options.dataTables.formEntity, response);
                            Nitsys.populateData(response);
                            $('#form-container').removeClass().addClass(
                                'fadeInDown animated').one(
                                'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend',
                                function () {
                                    $(this).removeClass();
                                });
                            $('body, html').animate({
                                scrollTop: $('#master-panel').offset().top
                            });
                        }
                    });
                } else {
                    //Show form to add new element
                    $('#form-container').removeClass().addClass(
                        'fadeInDown animated').one(
                        'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend',
                        function () {
                            $(this).removeClass();
                        });
                    $('body, html').animate({
                        scrollTop: $('#master-panel').offset().top
                    });
                }
            } else {
                window.location.href = options.dataTables.urls.edit + id;
            }
        }
    },
    loadViewForm: function (id, options) {
        if ("redirect" !== options.dataTables.viewType) {
            $('#view-container').load(options.dataTables.urls.view + id, function (result) {
                $('#view-container').removeClass().addClass(
                    'fadeInDown animated').one(
                    'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend',
                    function () {
                        $(this).removeClass();
                    });
                $('body, html').animate({
                    scrollTop: $('#master-panel').offset().top
                });
            });
        } else {
            window.location.href = options.dataTables.urls.view + id;
        }
    },
    deleteCallback: function (id, scObj) {
        options = scObj.options;
        var row = $('span[data-id="' + id + '"]').parents('tr');
        $('button.action').attr('disabled', 'disabled');
        $.ajax({
            url: options.dataTables.urls.delete + id,
            method: 'DELETE',
            data: {
                "_token": $('meta[name=csrf-token]').attr("content")
            },
            success: function (response) {
                setTimeout(function () {
                    Nitsys.removeConfirmPopUp();
                }, 2000);
                //remover linha e atualizar tabela
                if ("true" == response) {
                    $("#confirm-modal-body").append('<div class="alert alert-success return-alert">Registro eliminado com sucesso!</div>');
                    scObj.dataTablesObj.row(row)
                        .remove()
                        .draw();
                } else if ("false" == response) {
                    $("#confirm-modal-body").append('<div class="alert alert-danger return-alert">Não foi possível apagar o registro, tente novamente!</div>');
                } else if (response) {
                    $("#confirm-modal-body").append('<div class="alert alert-danger return-alert">' + response + '</div>');
                }
            },
            error: function () {
                setTimeout(function () {
                    $(".return-alert").remove();
                    $("#confirm-modal").modal("hide");
                }, 1000);
                $('#confirma-nao').removeAttr('disabled');
                $('#confirma-sim').removeAttr('disabled');
                $("#confirm-modal-body").append('<div class="alert alert-danger return-alert">Não foi possível apagar o registro, tente novamente!</div>');
            }
        });
    },
    parseFilterFooterActions: function () {
        if (this.options.dataTables.filterFooter) {
            this.dataTablesObj.columns().every(function () {
                var column = this;
                $('input', this.footer()).on('keyup change', function () {
                    if (column.search() !== this.value) {
                        column.search(this.value).draw();
                    }
                });
            });
        }
    },
    parseAddButton: function () {
        var options = this.options;
        var scObj = this;
        var button = '';
        if ('none' !== this.options.dataTables.addType) {
            if ("modal" == this.options.dataTables.addType) {
                button = `<button id="geraadd-` + this.options.dataTables.container + `" type="button" class="btn btn-primary table-action my-2">` + this.options.dataTables.addButtonText + `</button>`
            } else if ("inPage" == this.options.dataTables.addType) {
                button = `<button id="geraadd-` + this.options.dataTables.container + `" type="button" class="btn btn-primary table-action my-2">` + this.options.dataTables.addButtonText + `</button>`
            } else if ("redirect" == this.options.dataTables.addType) {
                button = `<a id="geraadd-` + this.options.dataTables.container + `" class="btn btn-primary my-2" href="` + this.options.dataTables.urls.add + `" role="button">` + this.options.dataTables.addButtonText + `</a>`
            }
        }
        if (!$("#geraadd-" + this.options.dataTables.container).length) {
            // gera botao Add
            $('#' + this.options.dataTables.container).closest('.simplecrud-panel').before(button);
            // gera clique do Add
            $(document).on('click', "#geraadd-" + this.options.dataTables.container, function () {
                SimpleCRUD.loadAddForm(scObj.options);
            });
        }
    },
    parseTable: function () {
        this.parseAddButton();
        var table = '<table id="lista-' + this.options.dataTables.container + '" class="table table-striped table-bordered responsive no-wrap w-100"><thead><tr>';
        if (this.options.dataTables.columns) {
            this.options.dataTables.columns.forEach(function (column) {
                if ("action" === column.id) {
                    table += (column.show ? `<th class="action-column">Ações</th>` : '');
                } else {
                    table += `<th>` + column.title + `</th>`;
                }
            });
        }
        table += `</tr></thead>`;
        if (this.options.dataTables.filterFooter) {
            table += `<tfoot><tr>`;
            if (this.options.dataTables.columns) {
                this.options.dataTables.columns.forEach(function (column) {
                    if ("action" !== column.id) {
                        table += `<th><input class="filtrofooter" type="text" placeholder="Busca ` + column.title + `" /></th>`;
                    } else {
                        table += `<th class="action-column-footer"></th>`
                    }
                });
            }
            table += `</tr></tfoot>`;
        }
        table += `</table>`;
        if (this.options.dataTables.container) {
            $('#' + this.options.dataTables.container).html(table);
        }
    },
    getDataTablesLanguage: function () {
        return {
            "sEmptyTable": "Nenhum registro encontrado",
            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
            "sInfoFiltered": "(Filtrados de _MAX_ registros)",
            "sInfoPostFix": "",
            "sInfoThousands": ".",
            "sLengthMenu": "_MENU_ resultados por página",
            "sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...",
            "sZeroRecords": "Nenhum registro encontrado",
            "sSearch": "Pesquisar",
            "oPaginate": {
                "sNext": "Próximo",
                "sPrevious": "Anterior",
                "sFirst": "Primeiro",
                "sLast": "Último"
            },
            "oAria": {
                "sSortAscending": ": Ordenar colunas de forma ascendente",
                "sSortDescending": ": Ordenar colunas de forma descendente"
            },
            "buttons": {
                copy: "Copiar",
                print: "Imprimir"
            }
        }
    },
    getDataTablesButtons: function () {
        var buttons = []
        if (this.options.dataTables.buttons) {
            if (this.options.dataTables.buttons.showColumns) {
                buttons.push({
                    extend: 'colvis',
                    text: 'Exibir Colunas'
                });
            }
            if (this.options.dataTables.buttons.copy) {
                buttons.push({
                    extend: 'copy',
                    text: '<i class="glyph-icon icon-copy"></i>',
                    titleAttr: 'Copiar para área de transferência',
                    exportOptions: {
                        columns: ':visible'
                    }
                });
            }
            if (this.options.dataTables.buttons.excel) {
                buttons.push({
                    extend: 'excel',
                    text: '<i class="glyph-icon icon-file-excel-o"></i>',
                    titleAttr: 'Exportar para Excel',
                    exportOptions: {
                        columns: ':visible'
                    }
                });
            }
            if (this.options.dataTables.buttons.csv) {
                buttons.push({
                    extend: 'csv',
                    text: '<i class="glyph-icon icon-file-o"></i>',
                    titleAttr: 'Exportar para arquivo CSV',
                    exportOptions: {
                        columns: ':visible'
                    }
                });
            }
            if (this.options.dataTables.buttons.pdf) {
                buttons.push({
                    extend: 'pdf',
                    text: '<i class="glyph-icon icon-file-pdf-o"></i>',
                    titleAttr: 'Exportar para PDF',
                    exportOptions: {
                        columns: ':visible'
                    }
                });
            }
            if (this.options.dataTables.buttons.print) {
                buttons.push({
                    extend: 'print',
                    text: '<i class="glyph-icon icon-print"></i>',
                    titleAttr: 'Imprimir',
                    exportOptions: {
                        columns: ':visible'
                    }
                });
            }
        }
        return buttons;
    },
    getDataTablesColumns: function () {
        var columns = [];
        var actionDescription = this.options.dataTables.actionDescription;
        var options = this.options;
        this.options.dataTables.columns.forEach(function (column) {
            if ("action" === column.id) {
                if (column.show) {
                    columns.push({
                        data: "id",
                        responsivePriority: 2,
                        visible: true,
                        width: "200px",
                        class: 'action-col',
                        render: function (data, type, full, meta) {
                            var id = full.id;
                            var permissions = full.actions;
                            addActionColumn = permissions[1] || permissions[2] || permissions[3] || column.botaourl || column.botaoinpage;
                            var name = full[actionDescription];
                            var returnButtons = (column.edit && permissions[1] ? '<span class="edit-' + options.dataTables.container + ' my-1 mx-2 text-primary font-weight-bold h3" data-id="' + id + '"  title="Editar"><i class="glyph-icon icon-edit"></i></span>' : '');
                            returnButtons += (column.delete && permissions[2] ? '<span class="delete-' + options.dataTables.container + ' text-danger font-weight-bold my-1 mx-2 h3" data-id="' + id + '" data-name="' + name + '" title="Excluir"><i class="glyph-icon icon-remove"></i></span>' : '');
                            returnButtons += (column.view && permissions[3] ? '<span class="view-' + options.dataTables.container + ' text-black font-weight-bold my-1 mx-2 h3" data-id="' + id + '" title="Visualizar"><i class="glyph-icon icon-eye icon-remove"></i></span>' : '');
                            returnButtons += (column.botaourl ? '<span class="botaourl-' + options.dataTables.container + ' text-success font-weight-bold my-1 mx-2 h3" data-id="' + id + '" title="Tecnologias com royalties"><i class="glyph-icon icon-linecons-money icon-remove"></i></span>' : '');
                            returnButtons += (column.botaoinpage ? '<span class="botaoinpage-' + options.dataTables.container + ' text-success font-weight-bold my-1 mx-2 h3" data-id="' + id + '" data-name="' + name + '"  title="Selecionar"><i class="glyph-icon icon-check"></i></span>' : '');
                            return returnButtons;
                        }
                    });
                }
            } else if (column.render === 'hyperlink') {
                columns.push({
                    data: column.id,
                    responsivePriority: column.priority,
                    visible: column.visible,
                    render: function (data, type, full, meta) {
                        var completeLink = full[column.id];
                        var parts = completeLink.split('::');
                        if (parts.length === 2) {
                            return '<a href="' + parts[1] + '" target="_blank">' + parts[0] + '</a>';
                        }
                    }
                });
            } else {
                columns.push({
                    data: column.id,
                    responsivePriority: column.priority,
                    visible: column.visible
                });
            }
        });
        return columns;
    }
}