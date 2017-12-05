  Ext.define('SystemAsset.Stobycostcenter.view.GRID_stobycostcenter', {
    extend: 'Ext.grid.Panel',
    alias: 'widget.GRID_stobycostcenter',
    title: 'Stock Opname By Cost Center',
    height: 400,
    width: 435,
    frame:true,
    plugins:'gridfilters',
    initComponent: function () {
      this.columns = [
        { xtype: 'rownumberer'},
        { header: 'Asset Cost Center',dataIndex:'AssetCostcenter',filter:'string'},
        { header: 'Total Asset',dataIndex:'TotalAsset',filter:'string'},
        { header: 'Scanned',dataIndex:'AssetScanned',filter:'string'},
        { header: 'Not Scanned',dataIndex:'AssetNotScan',filter:'string'},
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
