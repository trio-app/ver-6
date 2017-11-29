  Ext.define('SystemAsset.Assetpic.model.M_assetpic', {
    extend: 'Ext.data.Model',
    fields: ['PicID', 'PicName', 'PicDescription']
  });

  Ext.define('SystemAsset.Assetpic.store.ST_assetpic', {
    extend  : 'Ext.data.Store',
    model   : 'SystemAsset.Assetpic.model.M_assetpic',
    autoLoad : true,
    autoSync: true,
    proxy: {
        type: 'ajax',
        actionMethods: 'POST',
        api: {
            create: base_url + 'Assetpic/create',
            read: base_url + 'Assetpic/read',
            update: base_url + 'Assetpic/update',
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
