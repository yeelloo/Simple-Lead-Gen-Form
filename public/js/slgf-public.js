var SIGF = SIGF || {};

(function($) {
    // USE STRICT
    "use strict";

    SIGF.initialize = {

        init: () => {
            SIGF.initialize.submitForm();
        },

        isEmail: email => {
            const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(String(email).toLowerCase());
        },

        submitForm: () => {
            $('html').on('click', '#slgfSubmit', async function(event) {
                event.preventDefault();
                var _this = $(this)
                var _fid  = _this.attr('data-id')
                var _form = $(`#slgf-${_fid}`)
                var _error= false

                _form.find('.slgfError').removeClass('slgfError')
                _form.find('.slgfNotice').hide()
                
                var _data = {
                    action: 'slgf-submit',
                    name : _form.find('#slgfName').val(),
                    phone : _form.find('#slgfPhone').val(),
                    email : _form.find('#slgfEmail').val(),
                    budget  : _form.find('#slgfBudget ').val(),
                    message : _form.find('#slgfMessage').val(),
                    datetime: _form.find('#slfgDatetime').val(),
                    nonce   : slgf.nonce
                }

                if( _data.name == '' ){
                    _form.find('#slgfName').addClass('slgfError')
                    _error = true
                }

                if( _data.phone == '' ){
                    _form.find('#slgfPhone').addClass('slgfError')
                    _error = true
                }

                if( !SIGF.initialize.isEmail(_data.email) ){
                    _form.find('#slgfEmail').addClass('slgfError')
                    _error = true
                }

                if( _data.budget == '' ){
                    _form.find('#slgfBudget').addClass('slgfError')
                    _error = true
                }

                if( _data.subject == '' ){
                    _form.find('#cgeSubject').addClass('slgfError')
                    _error = true
                }

                if( _data.message == '' ){
                    _form.find('#slgfMessage').addClass('slgfError')
                    _error = true
                }

                if( _error ) return false

                _form.addClass('slgfWait')
                await $.post(slgf.ajax, _data).error(function() {
                    console.log('Action faild, Please try agian.')
                    _form.find('.slgfNotice').addClass('error').html('Action faild, Please try agian.').slideDown('200')
                }).success(function(data, textStatus, xhr) {
                    if( data.success ){
                        _form.addClass('slgfSuccess').html(data.msg)
                    }
                    else {
                        _form.find('.slgfNotice').addClass('error').html(data.msg).slideDown('200')
                    }
                });
                _form.removeClass('slgfWait')

            });
        }


    };

    SIGF.documentOnReady = {
        init: () => {
            SIGF.initialize.init();
        },
    };

    SIGF.documentOnLoad = {
        init: () => {
            
        },
    };

    SIGF.documentOnResize = {
        init: () => {

        },
    };

    SIGF.documentOnScroll = {
        init: () => {
            
        },
    };

    // Initialize Functions
    $(document).ready(SIGF.documentOnReady.init);
    $(window).on('load', SIGF.documentOnLoad.init);
    $(window).on('resize', SIGF.documentOnResize.init);
    $(window).on('scroll', SIGF.documentOnScroll.init);

})(jQuery);
