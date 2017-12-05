  Ext.define('SystemAsset.Assetlocation.view.GRID_assetlocation', {
    extend: 'Ext.grid.Panel',
    alias: 'widget.GRID_assetlocation',
    title: 'List Data Asset Location',
    height: 400,
    frame:true,
    plugins: 'gridfilters',
    initComponent: function () {
      this.columns = [
        { xtype: 'rownumberer'},
        { header: 'Location ID',dataIndex:'LocID',hidden:true },
        { header: 'Location Name',dataIndex:'LocName',filter:'string'},
        { header: 'Location Description',dataIndex:'LocDescription',filter:'string'},
    ];
       
      this.bbar = Ext.create('Ext.PagingToolbar', {
        store: this.store,
        displayInfo: true,
        displayMsg: 'Total Data {0} - {1} of {2}',
        emptyMsg: "No Data Display"
        });
        this.actions = {
            removeitem: Ext.create('Ext.Action', {
                text: 'Delete Record',
                handler: function () { this.fireEvent('removeitem', this.getSelected()) },
                scope: this,
                icon: extjs_url + 'examples/classic/shared/icons/fam/delete.gif',
            })
        };
        var contextMenu = Ext.create('Ext.menu.Menu', {
            items: [
                this.actions.removeitem
            ]
        });
        this.on({
            itemcontextmenu: function (view, rec, node, index, e) {
                e.stopEvent();
                contextMenu.showAt(e.getXY());
                return false;
            }
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
