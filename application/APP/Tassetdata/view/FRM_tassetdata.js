Ext.define('SystemAsset.Tassetdata.view.FRM_tassetdata',{
   extend: 'Ext.form.Panel',
   alias: 'widget.FRM_tassetdata',
   frame: true,
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
          padding: '5px',
          border: '0'
        },
        defaults: {
          xtype : 'textfield',
          anchor: '100%'
        },
        items : [                {
                    xtype:'hiddenfield',
                    name  : 'AssetID',
                    fieldLabel: 'Asset ID'
                },{
                    xtype: 'container',
                    layout: 'hbox',
                    defaults: {
                        margin: '0 5'
                    },
                    items: [{
                        xtype: 'combo',
                        editable: false,
                        name:'AssetInfo',
                        fieldLabel: 'Asset Type',
                        allowBlank: false,
                        store:['ASSET','INVENTARIS'],
                        labelAlign:'top',
                        flex: 1,
                    },{
                        xtype: 'textfield',
                        fieldLabel: 'Asset Key',labelAlign:'top',name: 'AssetKey',
                        allowBlank: false,flex: 2
                    },{
                        xtype: 'textfield',
                        fieldLabel: 'Asset/Inventaris No',labelAlign:'top',name: 'AssetNo',
                        allowBlank: false,flex: 2
                    },{
                        xtype: 'textfield',
                        fieldLabel: 'No. Reg Dept',labelAlign:'top',name: 'AssetNoRegDept',
                        flex: 2
                    },{
                        xtype: 'textfield',
                        fieldLabel: 'SAP No.',labelAlign:'top',name: 'AssetSAPNo',
                        flex: 2
                    }]
                },{
                    xtype: 'container',
                    defaultType: 'textfield',   
                    layout:'hbox',
                    defaults: {
                        margin: '0 5'
                    },
                    items: [,{
                            fieldLabel: 'Asset Name',labelAlign:'top',name: 'AssetName',
                            allowBlank: false,flex: 2
                        },{
                            xtype: 'combo',
                            editable: false,
                            flex: 1,
                            fieldLabel: 'PIC',
                            name:'AssetPic',
                            displayField: 'PicName',
                            valueField :'PicName',
                            allowBlank: false,
                            queryMode:'local',
                            store: Ext.create('Ext.data.ArrayStore', {
                                autoLoad:true,
                                fields: [ 'PicName','PicDescription' ],
                                proxy: {
                                    type: 'ajax',
                                    url: base_url + 'Assetpic/cbolist',
                                    reader: {
                                        type: 'json',
                                    }
                                }
                            }),
                            labelAlign:'top'
                        },{
                            xtype: 'combo',
                            editable: false,
                            flex: 1,
                            fieldLabel: 'Group',
                            margins: '0 10',
                            name:'AssetGroup',
                            allowBlank: false,
                            displayField: 'GroupName',
                            valueField :'GroupName',
                            queryMode:'local',
                            store: Ext.create('Ext.data.ArrayStore', {
                                autoLoad:true,
                                fields: [ 'GroupName','GroupDescription' ],
                                proxy: {
                                    type: 'ajax',
                                    url: base_url + 'Assetgroup/cbolist',
                                    reader: {
                                        type: 'json',
                                    }
                                }
                            }),
                            labelAlign:'top'                    
                        },{
                            xtype: 'combo',
                            editable: false,
                            flex: 1,
                            name:'AssetCategory',
                            fieldLabel: 'Category',
                            allowBlank: false,
                            displayField: 'CategoryName',
                            valueField :'CategoryName',
                            queryMode:'local',
                            store: Ext.create('Ext.data.ArrayStore', {
                                autoLoad:true,
                                fields: [ 'CategoryName','CategoryDescription' ],
                                proxy: {
                                    type: 'ajax',
                                    url: base_url + 'AssetCategory/cbolist',
                                    reader: {
                                        type: 'json',
                                    }
                                }
                            }),
                            labelAlign:'top'
                        },{
                            xtype: 'combo',
                            editable: false,
                            flex: 1,
                            fieldLabel: 'Location',
                            name:'AssetLocation',
                            allowBlank: false,
                            displayField: 'LocName',
                            valueField :'LocName',
                            queryMode:'local',
                            store: Ext.create('Ext.data.ArrayStore', {
                                autoLoad:true,
                                fields: [ 'LocName','LocDescription' ],
                                proxy: {
                                    type: 'ajax',
                                    url: base_url + 'Assetlocation/cbolist',
                                    reader: {
                                        type: 'json',
                                    }
                                }
                            }),
                            labelAlign:'top'                    
                        }]
                },{
                    xtype: 'container',
                    defaultType: 'textfield',   
                    layout:'hbox',
                    defaults: {
                      margin: '0 5'  
                    },
                    items: [{
                        fieldLabel: 'Sub Location',labelAlign:'top',name: 'AssetSublocation',
                        flex: 1
                    },{
                        xtype: 'combo',
                        editable: false,
                        flex: 1,
                        fieldLabel: 'Cost Center',
                        name:'AssetCostcenter',
                        displayField: 'CostName',
                        valueField :'CostName',
                        queryMode:'local',
                        store: Ext.create('Ext.data.ArrayStore', {
                            autoLoad:true,
                            fields: [ 'CostName','CostDescription' ],
                            proxy: {
                                type: 'ajax',
                                url: base_url + 'Assetcost/cbolist',
                                reader: {
                                    type: 'json',
                                }
                            }
                        }),
                        labelAlign:'top'                    
                    },{
                        xtype: 'combo',
                        editable: false,
                        flex: 1,
                        fieldLabel: 'Condition',
                        name:'AssetCondition',
                        allowBlank: false,
                        displayField: 'conName',
                        valueField :'conName',
                        queryMode:'local',
                        store: Ext.create('Ext.data.ArrayStore', {
                            autoLoad:true,
                            fields: [ 'conName'],
                            proxy: {
                                type: 'ajax',
                                url: base_url + 'Assetcondition/cbolist',
                                reader: {
                                    type: 'json',
                                }
                            }
                        }),
                        labelAlign:'top'
                        },{
                        fieldLabel: 'Aquisition Date',allowBlank: false,name: 'AssetAquisitiondate',xtype: 'datefield',
                        tooltip: 'Input Aquisition Date',labelAlign:'top',
                        format: 'Y-m-d',submitFormat: 'Y-m-d', flex: 1,editable: false,
                    },{
                        xtype: 'combo',
                        editable: false,
                        flex: 1,
                        fieldLabel: 'Type Label',
                        name:'AssetLabel',
                        allowBlank: false,
                        store:['BESAR','KECIL'],
                        labelAlign:'top'
                    }]
                },{
                    xtype: 'textfield',
                    fieldLabel: 'Remark',
                    name:'AssetRemark',
                    flex: 1,
                    margin: '5',
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

