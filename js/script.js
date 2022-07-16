var thumborUrlMenuPlugin = {
    name: 'ThumborUrl',
    allowedLists: ['files'],
    _extendFileActions: function(fileActions) {
        ['image/png', 'image/jpeg', 'image/gif', 'image/bmp', 'image/webp', 'image/svg+xml', 'image/x-xbitmap'].forEach(function(mime) {
            fileActions.registerAction({
                name: 'ThumborUrl',
                displayName: 'Get Thumbor Url',
                permissions: OC.PERMISSION_NONE,
                mime: mime,
                order: 100,
                actionHandler: function(fileName, context) {
                    console.log(fileName, context);
                    OC.dialogs.prompt(
                        'Enter the image filters',
                        'Get Thumbor URL',
                        function(result, filters) {
                            console.log(result, filters, fileName);
			    if(result == false) return ;
                            url = OC.generateUrl('/apps/thumborurl/api/1.0/sign');
                            var req = { path: context.dir, filename: fileName, filters: filters };

                            $.ajax({
                                url: url,
                                type: 'POST',
                                contentType: 'application/json',
                                data: JSON.stringify(req),
                            }).done(function(resp) {
                                console.log(resp);
                                OC.dialogs.info(resp.url, "Thumbor Url", function(r){});
                                navigator.clipboard.writeText(resp.url);
                            }).fail(function(resp) {
                                console.log(resp);
                            });
                        },
                        true,
                        'Filters',
                        false,
                    ).then(function() {
                        var $dialog = $('.oc-dialog:visible');
                        var input = $dialog.find('input');
                        input.val('/800x0/');
                    });
                }
            });
        });
    },
    attach: function(fileList) {
        console.log('thumborurl attach', fileList.id);
        if(this.allowedLists.indexOf(fileList.id) < 0) {
            return ;
        }
        console.log('thumborurl actions', fileList.fileActions)
        this._extendFileActions(fileList.fileActions);
    }
};
console.log("ThumborUrl Loaded");
OC.Plugins.register('OCA.Files.FileList', thumborUrlMenuPlugin);
