
function plotLeg(theta1,theta2)
theta1=2*pi*theta1/360;
theta2=2*pi*theta2/360;
clc
x1=0;
x2=sin(theta1);
x3=x2-sin(theta1-theta2-pi);
y1=2;
y2=2-cos(theta1);
y3=y2+cos(theta1-theta2-pi);
fig=figure(1);
ayy=plot([x1,x2,x3],[y1,y2,y3]);
hold on
lmao=plot([x1,x2,x3],[y1,y2,y3],'*');

H=gca;
set(H,'XTick',[-2 -1 0 1 2],'XLim',[-2 2]);
set(H,'YTick',[0 1 2],'YLim',[0 2],'DataAspectRatio',[1 1 1]);
set(lmao,'Color',[.5,.1,.9],'lineWidth',10)
set(ayy,'Color',[.9,.5,0],'lineWidth',5)
hold off
disp(x2)
disp(y2)

end