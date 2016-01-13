function dataCollect
clear all
clc
file=input('File name (include.csv)- ','s');
dick=arduino('COM3','uno');
data=[];
loop=1;
figure(1);

while loop
    plot(data);
    drawnow
    j=readVoltage(dick,0);
    data=[data,j];
    pause(.01);
end
csvwrite(sprintf(file),data)
