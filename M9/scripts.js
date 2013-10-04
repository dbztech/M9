//M9 JavaScript Document

function core() {
    this.showId = function(id) {
        document.getElementById(id).style.display = "block";
    }
    
    this.hideId = function(id) {
        document.getElementById(id).style.display = "none";
    }
    
    this.load = function() {
        //Called on load
    }
}

Core = new core;


function interface() {
    this.panelCount = 0;
    
    this.addPanel = function(panelId) {
        this.panelCount++;
        
        var bodyWidth = 100-((this.panelCount*5)+10);
        
        console.log(bodyWidth);
        document.getElementById("content").style.width = bodyWidth.toString()+"%";
        
        Core.showId(panelId);
    }
    
    this.removePanel = function(panelId) {
        this.panelCount--;
        
        var bodyWidth = 100-((this.panelCount*5)+10);
        
        console.log(bodyWidth);
        document.getElementById("content").style.width = bodyWidth.toString()+"%";
        
        Core.hideId(panelId);
    }
}

Interface = new interface;


function user() {
    this.username = function(id) {
        Core.showId('ChangeUsername');
        document.getElementById('ChangeUsernameId').value = id;
    }
    
    this.password = function(id) {
        Core.showId('ChangeUserPassword');
        document.getElementById('ChangePasswordId').value = id;
    }
    
    this.type = function(id) {
        Core.showId('ChangeUserType');
        document.getElementById('ChangeTypeId').value = id;
    }
    
    this.logout = function(id) {
        window.location = "Process.php?query=LogoutUser_"+id;
    }
    
    this.delete = function(id) {
        window.location = "Process.php?query=DeleteUser_"+id;
    }
}

User = new user;

function data() {
    this.edit = function(id) {
        Core.showId('ChangeDataContent');
        document.getElementById('ChangeDataId').value = id;
        document.getElementById('ChangeDataText').value = document.getElementById(id).innerHTML;
    }
    
    this.tag = function(id) {
        Core.showId('ChangeDataTag');
        document.getElementById('ChangeTagId').value = id;
    }
    
    this.delete = function(id) {
        window.location = "Process.php?query=DeleteData_"+id;
    }
}

Data = new data;