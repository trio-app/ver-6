  Ext.define('SystemAsset.Assetcost.view.GRID_assetcost', {
    extend: 'Ext.grid.Panel',
    alias: 'widget.GRID_assetcost',
    title: 'List Data Asset CostCenter',
    height: 400,
    frame:true,    
    initComponent: function () {
      this.columns = [
        { xtype: 'rownumberer'},
        { header: 'CostCenter ID',dataIndex:'CostID',hidden:true },
        { header: 'CostCenter Name',dataIndex:'CostName'},
        { header: 'CostCenter Description',dataIndex:'CostDescription'},
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
