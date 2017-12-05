Ext.define('SystemAsset.Tassetprint.view.GRID_tassetprint', {
    extend: 'Ext.grid.Panel',
    alias:'widget.GRID_tassetprint',    
    height: 400,
    stateful: true,
    multiSelect: true,
    frame: true,
    layout:'fit',
    title: 'Data Asset',
    selModel: Ext.create('Ext.selection.CheckboxModel') ,
    selType: 'cellmodel' ,  
    plugins: 'gridfilters',
    viewConfig: {
        stripeRows: true,
        multiSelect: true,
        enableTextSelection: true
    },

    initComponent: function () {
        var s = this.store;
        this.width = '100%';
        this.tbar = [
                 {text    : 'Print Barcode',action  : 'printbarcode',
                 icon: base_url +'system/inc/images/print.ico'}
             ];

        this.columns = [
            { header: 'No.', xtype: 'rownumberer',width:50},
            { header: 'Asset No',dataIndex:'AssetNo',width:100,locked : true, filter: 'string'},
            { header: 'Asset Name',dataIndex:'AssetName',width:250,locked : true, filter: 'string'},
            { header: 'Asset Key',dataIndex:'AssetKey',width:100, filter: 'string'},
            { header: 'No. Reg Dept',dataIndex:'AssetNoRegDept',width:100, filter: 'string'},
            { header: 'Group',dataIndex:'AssetGroup',width:100, filter: 'string'},
            { header: 'Category',dataIndex:'AssetCategory',width:100, filter: 'string'},
            { header: 'Location',dataIndex:'AssetLocation',width:100, filter: 'string'},
            { header: 'Sub Location',dataIndex:'AssetSublocation',width:100, filter: 'string'},
            { header: 'PIC',dataIndex:'AssetPic',width:100, filter: 'string'},
            { header: 'Condition',dataIndex:'AssetCondition',width:100, filter: 'string'},
            { header: 'Remark',dataIndex:'AssetRemark',width:100, filter: 'string'},
            { header: 'Aquisition Date',dataIndex:'AssetAquisitiondate',width:100, filter: 'string'},
            { header: 'Label',dataIndex:'AssetLabel',width:100, filter: 'string'},
            { header: 'Asset Info',dataIndex:'AssetInfo',width:100, filter: 'string'}
        ];
        this.bbar = [{
            text: 'Refresh',
            icon: extjs_url + 'examples/kitchensink/classic-en/resources/images/grid/refresh.gif',
            handler: function(){
                s.load()
            }     
        }];
      this.callParent(arguments);
    }
});