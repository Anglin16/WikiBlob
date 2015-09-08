
$(document).ready(function() {
    
    $("#delete").click(function deletArticle(title) {
        if (confirm("Are you sure you want to delete this page? It cannot be undone")) {
            console.log("Delete attempt");
            var pathname = window.location.pathname.split("/");
            var toDelete = pathname[pathname.length-1];
            toDelete = toDelete.replace("%20", " ");
            console.log(toDelete);
            var val  = $.get("delete.php", {toDelete : toDelete});
            console.log(val);
            alert("Page successfully deleted");
            window.location.replace("A");
        }
        
        return false;
    });
    
    $("#add").click(function addArticle() {
        console.log("add");
        window.location.replace("edit_page.php");
    });
    
    
    
});

