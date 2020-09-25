var $ = document;

$.addEventListener('DOMContentLoaded', function(){
    $.querySelector("[name='resume']").addEventListener('change', function(e) {
        var file = e.target.files[0],
            reader = new FileReader(),
            $preview1 = $.querySelector(".preview-1"),
            t = this;

            reader.onload = (function(file) {
                return function(e) {
                    while ($preview1.firstChild) $preview1.removeChild($preview1.firstChild);

                    var img = document.createElement("iframe");
                    img.setAttribute('src', e.target.result);
                    img.setAttribute('width', '400px');
                    img.setAttribute('height', '200px');
                    img.setAttribute('title', file.name);
                    $preview1.appendChild(img);
                };
            })(file);

            reader.readAsDataURL(file);
    });
});

$.addEventListener('DOMContentLoaded', function(){
    $.querySelector("[name='job_history_sheet']").addEventListener('change', function(e) {
        var file = e.target.files[0],
            reader = new FileReader(),
            $preview2 = $.querySelector(".preview-2"),
            t = this;

            reader.onload = (function(file) {
                return function(e) {
                    while ($preview2.firstChild) $preview2.removeChild($preview2.firstChild);

                    var img = document.createElement('iframe');
                    img.setAttribute('src', e.target.result);
                    img.setAttribute('width', '400px');
                    img.setAttribute('height', '200px');
                    img.setAttribute('title', file.name);
                    $preview2.appendChild(img);
                };
            })(file);

            reader.readAsDataURL(file);
    });
});