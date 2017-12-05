  Ext.define('SystemAsset.Stobypic.view.GRID_stobypic', {
    extend: 'Ext.grid.Panel',
    alias: 'widget.GRID_stobypic',
    title: 'Stock Opname By PIC',
    height: 400,
    width: 435,
    frame:true,
    plugins:'gridfilters',
    initComponent: function () {
      this.tbar = [
        '->',
        {text: 'Export Excel', action: 'export'}  
      ];
      this.columns = [
        { xtype: 'rownumberer'},
        { header: 'PIC',dataIndex:'AssetPic',filter:'string'},
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
