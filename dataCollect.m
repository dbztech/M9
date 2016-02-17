function dataCollect
clear all
clc
%%
file=input('File name (include.csv)- ','s');
controller=arduino('COM3','uno');

xMin=0;
xMax=100;
yMin=0;
yMax=3;

timescale=1;

leftPin=2
rightPin=0

%%
data=[0 0 0];
t=1;
%%
figure(1);
    
bg = uibuttongroup('Visible','off','Position',[0 0 .2 1],'SelectionChangedFcn',@bselection);
              
% Create three radio buttons in the button group.
r1 = uicontrol(bg,'Style','radiobutton','String','Record Data','Position',[10 350 100 30],'HandleVisibility','off');           
r2 = uicontrol(bg,'Style','radiobutton','String','Stop Recording','Position',[10 250 100 30],'HandleVisibility','off');
r3 = uicontrol(bg,'Style','text','String','Seconds','Position',[10 50 100 30]);
              
% Make the uibuttongroup visible after creating child objects. 
bg.Visible = 'on';
global buttonVal
buttonVal='Record Data   '
%%
    function bselection(source,callbackdata)
        
       buttonVal=callbackdata.NewValue.String;
       
       disp(buttonVal)
    end
datPlot=plot(data(1,1))
window=gca;
%%
while buttonVal=='Record Data   '
    if length(data)>xMax
    plot(data(end-xMax:end,2));
    else
        plot(data(:,2))
    end
    hold on
    if length(data)>xMax
    plot(data(end-xMax:end,3));
    else
        plot(data(:,3))
    end
    
    set(window,'YTick',[0,.5,1,1.5,2,2.5],'YAxisLocation','right');
    axis([xMin xMax yMin yMax]);
    drawnow
    hold off
    leftAnalog=readVoltage(controller,leftPin);
    rightAnalog=readVoltage(controller,rightPin);
    r4 = uicontrol(bg,'Style','text','String',sprintf('%d Volts \n(Analog 0)\n %d volts\n (Analog 1)\n %d',leftAnalog,rightAnalog,data(t,3)/10),'Position',[10 145 100 30]);
    data=[data;t,leftAnalog,rightAnalog];
    pause(timescale/1000);
    t=t+timescale;
end
csvwrite(sprintf(file),data)
end