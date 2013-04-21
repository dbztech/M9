//M9 JavaScript Document

function core() {
    this.showId = function(id) {
        document.getElementById(id).style.display = "block";
    };
    
    this.hideId = function(id) {
        document.getElementById(id).style.display = "none";
    };
    
    this.load = function() {
        //Called on load
    };
}

Core = new core;


function user() {
    this.username = function(id) {
        Core.showId('ChangeUsername');
        document.getElementById('ChangeUsernameId').value = id;
    };
    
    this.password = function(id) {
        Core.showId('ChangePassword');
        document.getElementById('ChangePasswordId').value = id;
    };
    
    this.type = function(id) {
        Core.showId('ChangeType');
        document.getElementById('ChangeTypeId').value = id;
    };
    
    this.logout = function(id) {
        window.location = "Process.php?query=Logout_"+id;
    };
    
    this.delete = function(id) {
        window.location = "Process.php?query=Delete_"+id;
    };
}

User = new user;