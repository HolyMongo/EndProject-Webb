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
    window.location = "loggedIn.php?assignment=" + Assignment; 
}

function DoneButton(){
    console.log("Marked as done!...");
    window.location = "MarkAsDone.php";
}

function AddEventListenersSwitchAssignment(item){
    item.addEventListener("click", SwitchAssignment);
}

function AddEventListenersDoneButton(item){
    item.addEventListener("click", DoneButton);
}
