$(function () {
            var i = -1;
            var toastCount = 0;
            var $toastlast;
            $('#showtoast').click(function () {
                var msg = "这是内容";
                var title = "这是标题";
                var remind_type="<{$CONFIG.REMIND_TYPE}>";//提醒类型
                var remind_position="<{$CONFIG.REMIND_POSITION}>";//提醒位置
                var showEasing="<{$CONFIG.SHOWEASING}>";//显示动画
                var hideEasing="<{$CONFIG.HIDEEASING}>";//隐藏动画
                var showMethod="<{$CONFIG.SHOWMETHOD}>";//显示方法
                var hideMethod="<{$CONFIG.HIDEMETHOD}>";//隐藏方法
                var timeOut="<{$CONFIG.TIMEOUT}>";//超时
                var extendedTimeOut="<{$CONFIG.EXTENDEDTIMEOUT}>";//延长时间
                var toastIndex = toastCount++;
                toastr.options = {
                    closeButton: true,
                    debug:  true,
                    progressBar:  true,
                    positionClass: remind_position,
                    onclick: null
                };
                
                toastr.options.showDuration = remind_type;
                toastr.options.hideDuration =remind_position;
                toastr.options.showEasing = showEasing;
                toastr.options.hideEasing = hideEasing;
                toastr.options.showMethod = showMethod;
                toastr.options.hideMethod = hideMethod;
                toastr.options.timeOut = timeOut;
                toastr.options.extendedTimeOut = extendedTimeOut;
                var $toast = toastr[remind_type](msg, title); // Wire up an event handler to a button in the toast, if it exists
                $toastlast = $toast;
            });
        })