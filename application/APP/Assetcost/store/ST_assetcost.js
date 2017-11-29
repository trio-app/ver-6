  Ext.define('SystemAsset.Assetcost.model.M_assetcost', {
    extend: 'Ext.data.Model',
    fields: ['CostID', 'CostName', 'CostDescription']
  });

  Ext.define('SystemAsset.Assetcost.store.ST_assetcost', {
    extend  : 'Ext.data.Store',
    model   : 'SystemAsset.Assetcost.model.M_assetcost',
    autoLoad : true,
    autoSync: true,
    proxy: {
        type: 'ajax',
        actionMethods: {create: 'POST',read: 'POST',update: 'POST',destroy: 'POST'},
        api: {
            create: base_url + 'Assetcost/create',
            read: base_url + 'Assetcost/read',
            update: base_url + 'Assetcost/update',
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
