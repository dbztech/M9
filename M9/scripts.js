//M9 JavaScript Document

function core() {
    this.showId = function(id) {
        document.getElementById(id).style.display = "block";
    }
    
    this.hideId = function(id) {
        document.getElementById(id).style.display = "none";
    }
    
    this.showViews = function(element, index, array) {
        //console.log(element);
        Core.showId(element);
    }
    
    this.hideViews = function(element, index, array) {
        //console.log(element);
        Core.hideId(element);
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
    
    this.popPanel = function(panelToPop, viewToShow) {
        Interface.removePanel(panelToPop);
        
        Interface.showView(viewToShow);
    }
    
    this.modalPanel = function(panelToModal, viewToShow) {
        Interface.addPanel(panelToModal);
        
        Interface.showView(viewToShow);
    }
    
    this.showView = function(viewToShow) {
        var allViews = ['Data', 'ChangeData', 'CreateData', 'ChangeDataContent', 'ChangeDataTag', 'Users', 'ChangeUsers', 'CreateUsers', 'ChangeUsername', 'ChangeUserPassword', 'ChangeUserType'];
        
        allViews.forEach(Core.hideViews);
        
        Core.showId(viewToShow);
        
    }
}

Interface = new interface;


function user() {
    this.username = function(id) {
        Interface.modalPanel("ChangeUsernameNav", "ChangeUsername");
        document.getElementById('ChangeUsernameId').value = id;
    }
    
    this.password = function(id) {
        Interface.modalPanel("ChangeUserPasswordNav", "ChangeUserPassword");
        document.getElementById('ChangePasswordId').value = id;
    }
    
    this.type = function(id) {
        Interface.modalPanel("ChangeUserTypeNav", "ChangeUserType");
        document.getElementById('ChangeTypeId').value = id;
    }
    
    this.logout = function(id) {
        window.location = "Process.php?query=LogoutUser_"+id;
    }
    
    this.delete = function(id) {
        window.location = "Process.php?query=DeleteUser_"+id;
    }
    
    this.change = function(id) {
        Interface.modalPanel("ChangeUsersNav", "ChangeUsers");
    }
    
    this.create = function(id) {
        Interface.modalPanel("CreateUsersNav", "CreateUsers");
    }
}

User = new user;

function data() {
    this.edit = function(id) {
        Interface.modalPanel("ChangeDataContentNav", "ChangeDataContent");
        document.getElementById('ChangeDataId').value = id;
        document.getElementById('ChangeDataText').value = document.getElementById(id).innerHTML;
    }
    
    this.tag = function(id) {
        Interface.modalPanel("ChangeDataTagNav", "ChangeDataTag");
        document.getElementById('ChangeTagId').value = id;
    }
    
    this.delete = function(id) {
        window.location = "Process.php?query=DeleteData_"+id;
    }
    
    this.change = function(id) {
        Interface.modalPanel("ChangeContentNav", "ChangeData");
    }
    
    this.create = function(id) {
        Interface.modalPanel("CreateContentNav", "CreateData");
    }
}

Data = new data;