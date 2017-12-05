  Ext.define('SystemAsset.Rassetdata.view.GRID_rassetdata', {
    extend: 'Ext.grid.Panel',
    alias: 'widget.GRID_rassetdata',
    title: 'Report Asset Data',
    height: 500,
    frame:true,    
    plugins: 'gridfilters',
    initComponent: function () {
        this.tbar = [
        '->',
        {text: 'Export Excel', action: 'export'}  
      ];
      this.columns = [
        { header: 'No.', xtype: 'rownumberer',width:50},  
        { header: 'Location ID',dataIndex:'AssetID',filter: 'string',hidden:true},
        { header: 'Asset No',dataIndex:'AssetNo',filter: 'string',width:70,locked   : true},
        { header: 'Asset Name',dataIndex:'AssetName',filter: 'string',width:250,locked   : true},
        { header: 'Asset Key',dataIndex:'AssetKey',filter: 'string',width:100,locked:false},
        { header: 'No. Reg Dept',dataIndex:'AssetNoRegDept',filter: 'string',width:100},
        { header: 'No. SAP',dataIndex:'AssetSAPNo',filter: 'string',width:100},
        { header: 'Group',dataIndex:'AssetGroup',filter: 'string',width:100},
        { header: 'Category',dataIndex:'AssetCategory',filter: 'string',width:100},
        { header: 'Location',dataIndex:'AssetLocation',filter: 'string',width:100},
        { header: 'Sub Location',dataIndex:'AssetSublocation',filter: 'string',width:100},
        { header: 'Cost Center',dataIndex:'AssetCostcenter',filter: 'string',width:100},
        { header: 'PIC',dataIndex:'AssetPic',filter: 'string',width:100},
        { header: 'Condition',dataIndex:'AssetCondition',filter: 'string',width:100},
        { header: 'Remark',dataIndex:'AssetRemark',filter: 'string',width:100},
        { header: 'Aquisition Date',dataIndex:'AssetAquisitiondate',filter: 'string',width:100},
        { header: 'Label',dataIndex:'AssetLabel',filter: 'string',width:100},
        { header: 'Asset Info',dataIndex:'AssetInfo',filter: 'string',width:100},
    ];
       
      this.bbar = Ext.create('Ext.PagingToolbar', {
        store: this.store,
        displayInfo: true,
        displayMsg: 'Total Data {0} - {1} of {2}',
        emptyMsg: "No Data Display"
        });
      this.callParent(arguments);
    }
  });
