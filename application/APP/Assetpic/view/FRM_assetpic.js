Ext.define('SystemAsset.Assetpic.view.FRM_assetpic',{
   extend: 'Ext.form.Panel',
   alias: 'widget.FRM_assetpic',
   frame: true,
   height: 400,
   title: 'Form Master Pic',
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
          name  : 'PicID',
          fieldLabel: 'Pic ID'
        },{
          name: 'PicName',
          fieldLabel: 'Pic Name ',
          allowBlank:false,
          vtype:'uniquename'
        },{
          name: 'PicDescription',
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

