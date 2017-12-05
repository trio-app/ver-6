  Ext.define('SystemAsset.Stobycategory.view.GRID_stobycategory', {
    extend: 'Ext.grid.Panel',
    alias: 'widget.GRID_stobycategory',
    title: 'Stock Opname By Category',
    height: 400,
    width: 435,
    frame:true,    
    initComponent: function () {
      this.columns = [
        { xtype: 'rownumberer'},
        { header: 'Asset Category',dataIndex:'AssetCategory'},
        { header: 'Total Asset',dataIndex:'TotalAsset'},
        { header: 'Scanned',dataIndex:'AssetScanned'},
        { header: 'Not Scanned',dataIndex:'AssetNotScan'},
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