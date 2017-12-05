  Ext.define('SystemAsset.Reportsto.model.M_reportsto', {
    extend: 'Ext.data.Model',
    fields: ['AssetID','AssetNo','AssetNoRegDept','AssetKey','AssetSAPNo','AssetName','AssetGroup',
                'AssetCategory','AssetLocation','AssetCostcenter','AssetPic','AssetCondition','AssetScanUser',
                'AssetRemark','AssetInfo','AssetSublocation','AssetLocationNew','AssetConditionNew',
                'AssetUsername','ScanDate','SystemDate']
  });

  Ext.define('SystemAsset.Reportsto.store.ST_reportsto', {
    extend  : 'Ext.data.Store',
    model   : 'SystemAsset.Reportsto.model.M_reportsto',
    autoLoad : true,
    autoSync: true,
    proxy: {
        type: 'ajax',
        actionMethods: {create: 'POST',read: 'POST',update: 'POST',destroy: 'POST'},
        api: {
            read: base_url + 'Reportsto/read',
        },
        reader: {
            type: 'json',
            rootProperty: 'Rows',
            totalProperty: 'TotalRows',
            successProperty: 'success'
        },
        writer: {
            type: 'json',
            writeAllFields: false
        }
    }
  });
