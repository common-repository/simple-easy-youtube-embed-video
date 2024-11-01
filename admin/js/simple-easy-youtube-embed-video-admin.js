(function seyevJs($) {

    'use strict';

    if (window.seyevObj === undefined) {
        return;
    }

    var seyevGen = {

        config: {
            seyevInsider: $("div#seyev-insider"),
            seyevId: $("#seyev_id"),
            output: $("<tr/>", {
                id: 'output',
                attr: {
                    valign: "top"
                }
            }),
            errorTag: $('<p/>', {
                id: 'seyev-error-msg'
            }),
            typeSelect: $('#seyev_type_selection'),
            startSeconds: $("#start_seconds"),
            typeQuality: $("#seyev_type_quality"),
            seyevClipbord: $('<input/>', {
                type: 'text',
                id: 'seyev-clipbord',
                class: 'all-options'
            }),
            dfVolume: 75,
        },
        init: function (config) {

            $.extend(this.config, config);

            var sIn = this.config.seyevInsider;

            this.config.seyevTable = sIn.find("table").first();

            sIn.on('click', "#seyev-generator", this.generatorCallBack)
                    .on('keyup', '#start_seconds', this.generatorCallBack)
                    .on('change', "#seyev_type_quality,#seyev_type_selection", this.generatorCallBack);

            this.setup();
        },
        
        setup: function () {
            var cf = this.config, csT = cf.seyevTable;
            cf.errorTag.insertAfter(csT).hide();
            csT.append(this.addVolumeHtml());
        },

        addVolumeHtml: function () {
            var cF = this.config;

            cF.seyevmute = $('<input/>', {
                type: "checkbox",
                id: "seyevmute"
            });

            cF.inputVolume = $('<input/>', {
                type: "number",
                class: "small-text player-volume",
                min: 0,
                max: 100,
                value: cF.dfVolume
            });

            return [$('<tr/>', {
                    valign: "top",
                    html: [
                        $('<td/>', {
                            scope: "row",
                            html: [
                                $('<label/>', {
                                    for : "tablecell",
                                    html: "Player Mute"
                                })
                            ]
                        }),
                        $('<td/>', {
                            html: [
                                cF.seyevmute
                                        .on('change', this.generatorCallBack)
                                        .on('change', function () {
                                            var $this = $(this), tr = $this.closest('tr').next('tr#trVolVolume');
                                            if ($this.is(':checked')) {
                                                tr.hide();
                                                return;
                                            }
                                            tr.show();
                                        }),
                                $('<span/>', {
                                    html: "Mute"
                                })
                            ]
                        })
                    ]
                }),
                $('<tr/>', {
                    valign: "top",
                    id: "trVolVolume",
                    html: [
                        $('<td/>', {
                            scope: "row",
                            html: [
                                $('<label/>', {
                                    for : "tablecell",
                                    html: "Player Volume"
                                })
                            ]
                        }),
                        $('<td/>', {
                            html: [
                                cF.inputVolume.on('change', this.generatorCallBack)
                            ]
                        })
                    ]
                })
            ];

        },

        trHtmlObj: function () {

            var sCb = this.config.seyevClipbord;

            return [
                $('<td/>', {
                    scope: "row",
                    html: $('<label/>', {
                        for : "tablecell",
                        html: seyevObj.copyMsg
                    })
                }),
                $('<td/>', {
                    html: [
                        sCb.attr({
                            value: this.shortcodeStr()
                        }),
                        $('<button/>', {
                            type: 'button',
                            class: 'button button-primary',
                            css: {
                                float: 'right'
                            },
                            html: 'Copy'
                        }).on('click', function () {
                            sCb.select();
                            document.execCommand('copy');
                            alert(seyevObj.copyMsg);
                        })
                    ]
                })
            ];
        },

        generatorCallBack: function () {

            var sgCf = seyevGen.config,
                    eTag = sgCf.errorTag,
                    oPut = sgCf.output, sTable = sgCf.seyevTable;

            var idVal = sgCf.seyevId.val();

            if (idVal === '' && idVal.length === 0) {
                oPut.hide();
                eTag.show().html(seyevObj.errorMsg);
                return;
            }

            eTag.hide();

            oPut.show();

            if (sTable.find(oPut).length) {
                sgCf.seyevClipbord.val(seyevGen.shortcodeStr());
                return;
            }

            oPut.html(seyevGen.trHtmlObj()).appendTo(sTable);
        },
        shortcodeStr: function () {

            var sCf = this.config;

            var sStr = '[' + seyevObj.shortcode + ' ' + sCf.typeSelect.val() + '=' + sCf.seyevId.val();

            var sVal = sCf.startSeconds.val(), qVal = sCf.typeQuality.val();

            if (sVal !== '' && sVal !== undefined) {
                var spVal = parseInt(sVal, 10);
                (!isNaN(spVal)) ? sStr += ' start_from=' + spVal : '';
            }

            if (qVal !== '' && qVal !== 'default' && qVal !== undefined) {
                sStr += ' quality=' + qVal;
            }

            sStr += this.volumeControl();

            return  sStr += ']';
        },
        volumeControl: function () {

            if (this.config.seyevmute.is(':checked')) {
                return ' mute=true';
            }

            var pVol = parseInt(this.config.inputVolume.val(), 10);

            if (!isNaN(pVol) && pVol !== undefined && pVol <= 100)
            {
                return ' volume=' + pVol;
            }

            return '';
        }
    };

    seyevGen.init();
})(jQuery);