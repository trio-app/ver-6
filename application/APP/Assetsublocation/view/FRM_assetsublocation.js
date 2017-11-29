Ext.define('SystemAsset.Assetgroup.view.FRM_assetgroup',{
   extend: 'Ext.form.Panel',
   alias: 'widget.FRM_assetgroup',
   frame: true,
   height: 400,
   title: 'Form Master Group',
   border: 0,
    config: {
            recordIndex: 0,
            actions: ''
    },   
   items: [{
        xtype : 'form',
        layout: 'anchor',
        bodyStyle: {
          background: 'none',
          padding: '10px',
          border: '0'
        },
        defaults: {
          xtype : 'textfield',
          anchor: '100%'
        },
        items : [{
          xtype:'hiddenfield',
          name  : 'SublocID',
          fieldLabel: 'Sublocation ID'
        },{
            xtype: 'combo',
            fieldLabel: 'Location Name',
            padding: '0 0 0 0',
            margins: '0 5 0 0',
            id: 'LocName',
            name:'LocName',
            allowBlank:false,
            vtype:'uniquename',
            displayField: 'LocName',
            valueField :'LocName',
            queryMode:'local',
            flex: 1,
            store: Ext.create('Ext.data.ArrayStore', {
                autoLoad:true,
                fields: [ 'LocName' ],
                proxy: {
                    type: 'ajax',
                    url: baseurl + 'Assetlocation/cbolist',
                    reader: {
                        type: 'json',
                    }
                }
            })  
        },{
          name: 'SubLocname',
          fieldLabel: 'Sub Location',
          allowBlank:false,
          vtype:'uniquename'
        },{
          name: 'SubDescription',
          fieldLabel: 'Description ',
          allowBlank:true
        }]
      }],
    buttons: [{
        text: 'Save',
        action: 'add'
    },{
        text    : 'Reset',
        handler : function () { 
            //Reset Form
            var frm = this.up('panel');
            frm.down('form').getForm().reset();
            frm.setActions('add');
        }
    }]  
});

    Ext.apply(Ext.form.field.VTypes, {
        uniquename: function (v) {
            return Ext.form.field.VTypes.uniquenameRegex.test(v);
        },
        uniquenameRegex: /^[A-Za-z]{1}[A-Za-z._0-9]*$/,
        uniquenameText: 'Invalid unique name'
    });

