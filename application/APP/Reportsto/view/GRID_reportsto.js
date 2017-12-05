  Ext.define('SystemAsset.Reportsto.view.GRID_reportsto', {
    extend: 'Ext.grid.Panel',
    alias: 'widget.GRID_reportsto',
    title: 'Report STO(Stock Opname)',
    height: '500',
    frame:true,    
    initComponent: function () {
        this.tbar = [
        '->',
        {text: 'Export Excel', action: 'export'}  
      ];
      this.columns = [
        { xtype:'rownumberer',width:40},
        { header: 'Asset ID',dataIndex:'AssetID',filter:true,hidden:true},
        { header: 'Asset No',dataIndex:'AssetNo',filter:true, width: 70, locked: true},
        { header: 'Asset No Reg Dept',dataIndex:'AssetNoRegDept',filter:true,width:120,locked   : true},
        { header: 'Asset Key',dataIndex:'AssetKey',filter:true,width:250,locked   : true},
        { header: 'Asset Name',dataIndex:'AssetName',filter:true,width:100,locked:false},
        { header: 'Group',dataIndex:'AssetGroup',filter:true,width:100},
        { header: 'Category',dataIndex:'AssetCategory',filter:true,width:100},
        { header: 'PIC',dataIndex:'AssetPic',filter:true,width:100},
        { header: 'Location',dataIndex:'AssetLocation',filter:true,width:100},
        { header: 'Location New',dataIndex:'AssetLocationNew',filter:true,width:100},
        { header: 'Sub Location',dataIndex:'AssetSublocation',filter:true,width:100},
        { header: 'Condition',dataIndex:'AssetCondition',filter:true,width:100},
        { header: 'Condition New',dataIndex:'AssetConditionNew',filter:true,width:100},
        { header: 'Remark',dataIndex:'AssetRemark',filter:true,width:100},
        { header: 'User NIK',dataIndex:'AssetScanUser',filter:true,width:100},
        { header: 'User Scan',dataIndex:'AssetUsername',filter:true,width:100},
        { header: 'Scan Date',dataIndex:'ScanDate',filter:true,width:100},
        { header: 'Upload Date',dataIndex:'SystemDate',filter:true,width:100},
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
