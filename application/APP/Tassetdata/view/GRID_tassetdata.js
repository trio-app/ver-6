  Ext.define('SystemAsset.Tassetdata.view.GRID_tassetdata', {
    extend: 'Ext.grid.Panel',
    alias: 'widget.GRID_tassetdata',
    frame:true,
    height: 270,
    plugins: 'gridfilters',
    initComponent: function () {
      var s = this.store;
      this.columns = [
        { header: 'No.', xtype: 'rownumberer',width:50},
        { header: 'Location ID',dataIndex:'AssetID',hidden:true},
        { header: 'Asset No',dataIndex:'AssetNo',width:70,locked   : true, filter: 'string'},
        { header: 'Asset Name',dataIndex:'AssetName',width:250,locked: true, filter: 'string'},
        { header: 'Asset Key',dataIndex:'AssetKey',width:100,locked:false, filter: 'string'},
        { header: 'No. Reg Dept',dataIndex:'AssetNoRegDept',width:100, filter: 'string'},
        { header: 'No. SAP',dataIndex:'AssetSAPNo',width:100, filter: 'string'},
        { header: 'Group',dataIndex:'AssetGroup',width:100, filter: 'string'},
        { header: 'Category',dataIndex:'AssetCategory',width:100, filter: 'string'},
        { header: 'Location',dataIndex:'AssetLocation',width:100, filter: 'string'},
        { header: 'Sub Location',dataIndex:'AssetSublocation',width:100, filter: 'string'},
        { header: 'Cost Center',dataIndex:'AssetCostcenter',width:100, filter: 'string'},
        { header: 'PIC',dataIndex:'AssetPic',width:100, filter: 'string'},
        { header: 'Condition',dataIndex:'AssetCondition',width:100, filter: 'string'},
        { header: 'Remark',dataIndex:'AssetRemark',width:100, filter: 'string'},
        { header: 'Aquisition Date',dataIndex:'AssetAquisitiondate',width:100, filter: 'string'},
        { header: 'Label',dataIndex:'AssetLabel',width:100, filter: 'string'},
        { header: 'Asset Info',dataIndex:'AssetInfo',width:100, filter: 'string'},
    ];
      this.bbar = [
        {
            text: 'Refresh',
            icon: extjs_url + 'examples/kitchensink/classic-en/resources/images/grid/refresh.gif',
            handler: function(){
                s.load()
            }
        }];

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
