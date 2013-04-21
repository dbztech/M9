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
        window.location = "Process.php?query=LogouUser_"+id;
    };
    
    this.delete = function(id) {
        window.location = "Process.php?query=DeleteUser_"+id;
    };
}

User = new user;

function data() {
    this.edit = function(id) {
        Core.showId('ChangeData');
        document.getElementById('ChangeDataId').value = id;
        document.getElementById('ChangeDataText').value = document.getElementById(id).innerHTML;
    };
    
    this.tag = function(id) {
        Core.showId('ChangeTag');
        document.getElementById('ChangeTagId').value = id;
    };
    
    this.delete = function(id) {
        window.location = "Process.php?query=DeleteData_"+id;
    };
}

Data = new data;