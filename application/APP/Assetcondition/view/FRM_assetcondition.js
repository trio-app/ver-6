Ext.define('SystemAsset.Assetcondition.view.FRM_assetcondition',{
   extend: 'Ext.form.Panel',
   alias: 'widget.FRM_assetcondition',
   frame: true,
   height: 400,
   title: 'Form Master Condition',
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
          name  : 'conID',
          fieldLabel: 'Condition ID'
        },{
          name: 'conName',
          fieldLabel: ' Name ',
          allowBlank:false,
          vtype:'uniquename'
        },{
          name: 'conDescription',
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
        uniquenameRegex: /^[A-Za-z]{1}[A-Za-z. _0-9]*$/,
        uniquenameText: 'Invalid unique name'
    });

