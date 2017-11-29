  Ext.define('SystemAsset.Assetlocation.controller.C_assetlocation', {
    extend  : 'Ext.app.Controller',
    init: function () {
        this.control({
            'FRM_assetlocation button[action=add]': {
                click: this.doSaveform
            },
            'GRID_assetlocation': {
                itemdblclick: this.onRowdblclick,
                removeitem: this.removeitem
            },
      });
    },
    onRowdblclick: function(me, record, item, index){
        var form = Ext.getCmp('FRM_assetlocation').down('form');
        form.up().setActions('edit');
        form.getForm().setValues(record.getData());
    },
    doSaveform: function(){
        //var win = Ext.getCmp('form1');
        var form = Ext.getCmp('FRM_assetlocation').down('form');
        var values = form.getValues();
        var record = form.getRecord();
        var action = form.up().getActions();
        var recValue = Ext.create('SystemAsset.Assetlocation.model.M_assetlocation', values);
        console.log(action);
        if(action == 'edit') {

            if(form.isValid()){
              this.doProsesCRUD('update',recValue);
          }
        }
        else {
            if(form.isValid()){
              this.doProsesCRUD('create',recValue);
          }
        } 
    },
    removeitem: function(record){
        Ext.Msg.confirm('Delete Data.', 'Delete <b>' + record.data.LocName + '</b>.<br/>Are you sure?', function (button) {
            if (button == 'yes') {
                this.doProsesCRUD('delete',record);
                //console.log(record.data);
            }
        }, this);
    },
    doProsesCRUD : function (inAction,record){
        var grid = Ext.getCmp('GRID_assetlocation');
        var form = Ext.getCmp('FRM_assetlocation');
        var store = grid.getStore();//Ext.getStore('SystemAsset.Assetlocation.store.STassetlocation');;//
        console.log(record.data);
        Ext.Ajax.request({
                    url: base_url + 'Assetlocation/' +  inAction,
                    method: 'POST',
                    //type:'json',
                    params: JSON.stringify(record.data),
                    success: function(response, o){
                        switch(inAction) {
                            case 'delete':
                                console.log(o);
                                    store.load();
                                    Ext.toast({
                                        html: 'Delete Asset Location Success',
                                        title: 'Notification',
                                        width: 200,
                                        align: 'tr',
                                        icon: extjs_url + 'packages/ux/classic/crisp/resources/images/statusbar/accept.png',
                                        timeout: 5000
                                    });
                                break;
                            case 'create' :
                                    store.load();
                                    Ext.toast({
                                        html: 'Create Asset Location Success',
                                        title: 'Notification',
                                        width: 200,
                                        align: 'tr',
                                        icon: extjs_url + 'packages/ux/classic/crisp/resources/images/statusbar/accept.png',
                                        timeout: 5000
                                    });
                                break;
                            case 'update' :
                                    store.load();
                                    Ext.toast({
                                        html: 'Update Asset Location Success',
                                        title: 'Notification',
                                        width: 200,
                                        align: 'tr',
                                        icon: extjs_url + 'packages/ux/classic/crisp/resources/images/statusbar/accept.png',
                                        timeout: 5000
                                    });
                                break;
                        }
                    form.reset();
                    form.setActions('');

                    },
                    failure: function(response){
                        Ext.Msg.alert('server-side failure with status code ' + response.status  , response.responseText);
                    }
                });
    },
    
  });