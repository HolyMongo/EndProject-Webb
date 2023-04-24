if (document.getElementsByClassName("ModuleItem")) {
    var modules = document.querySelectorAll(".ModuleItem");
    modules.forEach(AddEventListeners);
};

function SwitchAssignment(Event) {
    var Assignment = Event.target.id;

    window.location = "http://localhost:84/EndProject-Webb/loggedIn.php?assignment=" + Assignment; 
}

function AddEventListeners(item){
    item.addEventListener("click", SwitchAssignment);
}