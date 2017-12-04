  Ext.define('SystemAsset.Rassetdata.view.GRID_rassetdata', {
    extend: 'Ext.grid.Panel',
    alias: 'widget.GRID_rassetdata',
    title: 'Report Asset Data',
    height: '500',
    frame:true,    
    initComponent: function () {
        this.tbar = [
        '->',
        {text: 'Export Excel', action: 'export'}  
      ];
      this.columns = [
        { xtype:'rownumberer',width:40},  
        { header: 'Location ID',dataIndex:'AssetID',filter:true,hidden:true},
        { header: 'Asset No',dataIndex:'AssetNo',filter:true,width:70,locked   : true},
        { header: 'Asset Name',dataIndex:'AssetName',filter:true,width:250,locked   : true},
        { header: 'Asset Key',dataIndex:'AssetKey',filter:true,width:100,locked:false},
        { header: 'No. Reg Dept',dataIndex:'AssetNoRegDept',filter:true,width:100},
        { header: 'No. SAP',dataIndex:'AssetSAPNo',filter:true,width:100},
        { header: 'Group',dataIndex:'AssetGroup',filter:true,width:100},
        { header: 'Category',dataIndex:'AssetCategory',filter:true,width:100},
        { header: 'Location',dataIndex:'AssetLocation',filter:true,width:100},
        { header: 'Sub Location',dataIndex:'AssetSublocation',filter:true,width:100},
        { header: 'Cost Center',dataIndex:'AssetCostcenter',filter:true,width:100},
        { header: 'PIC',dataIndex:'AssetPic',filter:true,width:100},
        { header: 'Condition',dataIndex:'AssetCondition',filter:true,width:100},
        { header: 'Remark',dataIndex:'AssetRemark',filter:true,width:100},
        { header: 'Aquisition Date',dataIndex:'AssetAquisitiondate',filter:true,width:100},
        { header: 'Label',dataIndex:'AssetLabel',filter:true,width:100},
        { header: 'Asset Info',dataIndex:'AssetInfo',filter:true,width:100},
    ];
       
      this.bbar = Ext.create('Ext.PagingToolbar', {
        store: this.store,
        displayInfo: true,
        displayMsg: 'Total Data {0} - {1} of {2}',
        emptyMsg: "No Data Display"
        });
      this.callParent(arguments);
    },
    
    getSelected: function () {
        var sm = this.getSelectionModel();
        var rs = sm.getSelection();
        if (rs.length) {
            return rs[0];
        }
        return null;
    }
  });
