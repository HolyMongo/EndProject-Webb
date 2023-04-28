if (document.getElementsByClassName("ModuleItem")) {
    var modules = document.querySelectorAll(".ModuleItem");
    modules.forEach(AddEventListenersSwitchAssignment);
}

if (document.getElementsByClassName("DoneButton")) {
    var doneButtons = document.querySelectorAll(".DoneButton");
    doneButtons.forEach(AddEventListenersDoneButton);
}

function SwitchAssignment(Event) {
    var Assignment = Event.target.id;

    window.location = "http://localhost:84/EndProject-Webb/loggedIn.php?assignment=" + Assignment; 
}

function DoneButton(Event){
    console.log("Marked as done!...");
    window.location = "http://localhost:84/EndProject-Webb/MarkAsDone.php";

    
}

function AddEventListenersSwitchAssignment(item){
    item.addEventListener("click", SwitchAssignment);
}


//maybe do later idk. I think it may involve ajax soooo........
function AddEventListenersDoneButton(item){
    item.addEventListener("click", DoneButton);
}
