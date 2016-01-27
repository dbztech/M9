function dataCollect
clear all
clc
%%
file=input('File name (include.csv)- ','s');
fetty=arduino('COM3','uno');
%%
data=[0 0 0];
t=1;
%%
figure(1);
    
bg = uibuttongroup('Visible','off',...
                  'Position',[0 0 .2 1],...
                  'SelectionChangedFcn',@bselection);
              
% Create three radio buttons in the button group.
r1 = uicontrol(bg,'Style',...
                  'radiobutton',...
                  'String','Record Data',...
                  'Position',[10 350 100 30],...
                  'HandleVisibility','off');
              
r2 = uicontrol(bg,'Style','radiobutton',...
                  'String','Stop Recording',...
                  'Position',[10 250 100 30],...
                  'HandleVisibility','off');
              r3 = uicontrol(bg,'Style','text',...
                  'String','Timestamp:',...
                  'Position',[10 175 100 30]);
r3 = uicontrol(bg,'Style','text',...
                  'String','Seconds',...
                  'Position',[10 50 100 30]);
              
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
asdf=gca;
set(asdf,'YTick',[0,1,2,3,4,5],'YAxisLocation','right');
%%
while buttonVal=='Record Data   '
    if length(data)>100
    plot(data(end-100:end,1));
    else
        plot(data(:,1))
    end
    hold on
    if length(data)>100
    plot(data(end-100:end,2));
    else
        plot(data(:,2))
    end
    
              set(asdf,'YTick',[0,1,2,3,4,5],'YAxisLocation','right');
              axis([0 100 0 3]);
    drawnow
    hold off
    j=readVoltage(fetty,0);
    k=readVoltage(fetty,2);
    r4 = uicontrol(bg,'Style','text',...
                  'String',sprintf('%d Volts \n(Analog 0)\n %d volts\n (Analog 1)\n %d',j,k,data(t,3)/10),...
                  'Position',[10 145 100 30]);
    data=[data;j,k,t];
    pause(0.001);
    t=t+1;
end
csvwrite(sprintf(file),data)
end