Ext.define('SystemAsset.Assetcost.view.FRM_assetcost',{
   extend: 'Ext.form.Panel',
   alias: 'widget.FRM_assetcost',
   frame: true,
   height: 400,
   title: 'Form Master CostCenter',
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
          name  : 'CostID',
          fieldLabel: 'CostCenter ID'
        },{
          name: 'CostName',
          fieldLabel: 'Cost Name ',
          allowBlank:false,
          vtype:'uniquename'
        },{
          name: 'CostDescription',
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

