  Ext.define('SystemAsset.Assetlocation.model.M_assetlocation', {
    extend: 'Ext.data.Model',
    fields: ['LocID', 'LocName', 'LocDescription']
  });

  Ext.define('SystemAsset.Assetlocation.store.ST_assetlocation', {
    extend  : 'Ext.data.Store',
    model   : 'SystemAsset.Assetlocation.model.M_assetlocation',
    autoLoad : true,
    autoSync: true,
    proxy: {
        type: 'ajax',
        actionMethods:{create: 'POST',read: 'POST',update: 'POST',destroy: 'POST'},
        api: {
            create: base_url + 'Assetlocation/create',
            read: base_url + 'Assetlocation/read',
            update: base_url + 'Assetlocation/update',
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
