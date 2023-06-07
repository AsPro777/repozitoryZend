/*const box = document.getElementById('box');
const text = document.createTextNode(' tutorial');
box.appendChild(text);*/
Ext.application({
    name: 'SenchaApp',
    launch: function () {
        Ext.create('Ext.panel.Panel', {
            title: 'Sencha App',
            width: 300,
            height: 300,
            bodyPadding:10,
            renderTo: 'whitespace',
            html:'Hello World'
        });
    }
});