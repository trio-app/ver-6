Ext.define('SystemAsset.Cpuser.view.FRM_cpuser',{
   extend: 'Ext.form.Panel',
   alias: 'widget.FRM_cpuser',
   frame: true,
   height: 400,
   title: 'Form Setting User Access',
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
          name  : 'userID',
          fieldLabel: 'User ID'
        },{
          name: 'userLogin',
          fieldLabel: 'User Login',
          allowBlank: false
        },{
          name: 'user_nik',
          fieldLabel: 'NIK No.',
          allowBlank: false
        },{
          name: 'userName',
          fieldLabel: 'User Name',
          allowBlank: false
        },{
            xtype: 'combo',
            fieldLabel: 'Group By',
            padding: '10 0 0 0',
            margins: '10 10 0 0',
            name:'userGroup',
            allowBlank: false,
            editable: false,
            displayField: 'GroupName',
            valueField :'GroupName',
            queryMode:'local',
            store: Ext.create('Ext.data.ArrayStore', {
                autoLoad:true,
                fields: [ 'GroupName' ],
                proxy: {
                    type: 'ajax',
                    url: base_url + 'Cpgroup/cbolist',
                    reader: {
                        type: 'json'
                    }
                }
            })
        },{
          name: 'userPassword',
          fieldLabel: 'User Password',
          inputType: 'password',
          allowBlank: false
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

