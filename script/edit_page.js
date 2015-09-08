
$(document).ready(function() {
    
    $("#submit").click(function deletArticle(title) {
        if (confirm("Are you sure you want to submit this page? Changes are permanent")) {
            console.log("Upsert attempt");
            var pathname = window.location.pathname.split("/");
            var toUpsert = $("#title").val();
            var content = $("textarea#content").val();
            console.log(content);
            console.log(toUpsert);
            var val  = $.get("upsert.php", {Title : toUpsert, Content: content});
            console.log(val);
            window.location.replace(toUpsert);
        }
        
        return false;
    });
    
    
    
});