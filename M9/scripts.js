//M9 JavaScript Document

function core() {
    this.showId = function(id) {
        try {
           document.getElementById(id).style.display = "block";
        }
        catch (e) {
           // statements to handle any exceptions
        }
    }
    
    this.hideId = function(id) {
        try {
           document.getElementById(id).style.display = "none";
        }
        catch (e) {
           // statements to handle any exceptions
        }
        
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
    this.currentPanel = "";
    this.lastView = "";
    
    
    this.addPanel = function(panelId) {
        this.panelCount++;
        
        var bodyWidth = 100-((this.panelCount*5)+10);
        
        //console.log(bodyWidth);
        document.getElementById("content").style.width = bodyWidth.toString()+"%";
        
        Core.showId(panelId);
    }
    
    this.removePanel = function(panelId) {
        this.panelCount--;
        
        var bodyWidth = 100-((this.panelCount*5)+10);
        
        //console.log(bodyWidth);
        document.getElementById("content").style.width = bodyWidth.toString()+"%";
        
        Core.hideId(panelId);
    }
    
    this.popPanel = function(panelToPop, viewToShow) {
        Interface.removePanel(panelToPop);
        
        Interface.showView(viewToShow);
    }
    
    this.modalPanel = function(panelToModal, viewToShow, currentView) {
        Interface.lastView = currentView;
        Interface.currentPanel = panelToModal;
        
        Interface.addPanel(panelToModal);
        
        Interface.showView(viewToShow);
    }
    
    this.popPanel = function() {
        Interface.removePanel(Interface.currentPanel);
        
        Interface.showView(Interface.lastView);
    }
    
    this.showView = function(viewToShow) {
        var allViews = ['Data', 'ChangeData', 'CreateData', 'ChangeDataContent', 'ChangeDataTag', 'Users', 'ChangeUsers', 'CreateUsers', 'ChangeUsername', 'ChangeUserPassword', 'ChangeUserType'];
        
        allViews.forEach(Core.hideViews);
        
        if (viewToShow == "ChangeData" || viewToShow == "CreateData" || viewToShow == "ChangeUsers" || viewToShow == "CreateUsers") {
            Interface.lastView = "homeviews";
            Interface.currentPanel = viewToShow+"Nav";
        }
        
        if (viewToShow == "homeviews") {
            Core.showId("Data");
            Core.showId("Users");
            Core.hideId("Back");
        } else {
            Core.showId(viewToShow);
            Core.showId("Back");
        }
        
    }
}

Interface = new interface;


function user() {
    this.username = function(id) {
        Interface.modalPanel("ChangeUsernameNav", "ChangeUsername", "ChangeUsers");
        document.getElementById('ChangeUsernameId').value = id;
    }
    
    this.password = function(id) {
        Interface.modalPanel("ChangeUserPasswordNav", "ChangeUserPassword", "ChangeUsers");
        document.getElementById('ChangePasswordId').value = id;
    }
    
    this.type = function(id) {
        Interface.modalPanel("ChangeUserTypeNav", "ChangeUserType", "ChangeUsers");
        document.getElementById('ChangeTypeId').value = id;
    }
    
    this.logout = function(id) {
        window.location = "Process.php?query=LogoutUser_"+id;
    }
    
    this.delete = function(id) {
        window.location = "Process.php?query=DeleteUser_"+id;
    }
    
    this.change = function(id) {
        Interface.modalPanel("ChangeUsersNav", "ChangeUsers", "homeviews");
    }
    
    this.create = function(id) {
        Interface.modalPanel("CreateUsersNav", "CreateUsers", "homeviews");
    }
    
    this.addGroup = function(user) {
        document.getElementById('addGroupUser').value = user;
        Interface.modalPanel("AddGroupNav", "AddGroup", "ChangeUsers");
    }
    
    this.removeGroup = function(user, group) {
        document.getElementById('removeGroupModalBody').innerHTML = "Are you sure you want to <b>remove</b> group <b>#"+group+"</b> from this user";
        document.getElementById('removeGroupUser').value = user;
        document.getElementById('removeGroupGroup').value = group;
        $('#removeGroupModal').modal('show');
    }
}

User = new user;

function data() {
    this.edit = function(id) {
        Interface.modalPanel("ChangeDataContentNav", "ChangeDataContent", "ChangeData");
        document.getElementById('ChangeDataId').value = id;
        //document.getElementById('ChangeDataText').value = document.getElementById(id).innerHTML;
        tinyMCE.get("ChangeDataText").setContent(document.getElementById(id).innerHTML);
    }
    
    this.tag = function(id) {
        Interface.modalPanel("ChangeDataTagNav", "ChangeDataTag", "ChangeData");
        document.getElementById('ChangeTagId').value = id;
    }
    
    this.delete = function(id) {
        window.location = "Process.php?query=DeleteData_"+id;
    }
    
    this.change = function(id) {
        Interface.modalPanel("ChangeDataNav", "ChangeData", "homeviews");
    }
    
    this.create = function(id) {
        Interface.modalPanel("CreateDataNav", "CreateData", "homeviews");
    }
}

Data = new data;