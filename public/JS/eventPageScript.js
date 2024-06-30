document.addEventListener("DOMContentLoaded", (event) => {
    // Get the modal
    var modal = document.getElementById("myModal");
    
    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];
    
    // Get all items in the list
    var items = document.getElementsByClassName("doc-card-container");
    
    // Loop through the items and add click event
    for (var i = 0; i < items.length; i++) {
        items[i].onclick = function() {
            var name = this.getAttribute("data-name");
            var description = this.getAttribute("data-description");
            var date = this.getAttribute("data-date");

            // Debugging: Log data to the console
            console.log("Name:", name);
            console.log("Description:", description);
            console.log("Date:", date);
    
            // Set the modal content
            document.getElementById("modal-title").innerText = name;
            document.getElementById("modal-description").innerText = description;
            document.getElementById("modal-date").innerText = date;
    
            // Display the modal
            modal.style.display = "block";
        }
    }
    
    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }
    
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
});
