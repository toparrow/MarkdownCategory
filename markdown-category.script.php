<script type="text/javascript">
(function () {
    if (document.getElementsByClassName) {
        marked.setOptions({
            gfm: true,
            tables: true,
            breaks: false,
            pedantic: false,
            sanitize: true,
            smartLists: true,
            smartypants: false,
            langPrefix: 'language-',
            highlight: function(code, lang) {
                // hogehoge
                return code;
            }
        });
        var elems = document.getElementsByClassName('markdown-category');
        if (elems) {
            for (var i = 0; i < elems.length; i++) {
                elems[i].innerHTML = marked(elems[i].innerHTML);
            }
        }
    }
})();
</script>