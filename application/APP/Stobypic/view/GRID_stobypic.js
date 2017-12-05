  Ext.define('SystemAsset.Stobypic.view.GRID_stobypic', {
    extend: 'Ext.grid.Panel',
    alias: 'widget.GRID_stobypic',
    title: 'Stock Opname By PIC',
    height: 400,
    width: 435,
    frame:true,    
    initComponent: function () {
      this.columns = [
        { xtype: 'rownumberer'},
        { header: '',dataIndex:'',hidden:true },
        { header: 'PIC',dataIndex:'AssetPic'},
        { header: 'Total Asset.',dataIndex:'TotalAsset'},
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