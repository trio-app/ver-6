  Ext.define('SystemAsset.Cpgroup.model.M_cpgroup', {
    extend: 'Ext.data.Model',
    fields: ['GroupID', 'GroupName', 'GroupDescription']
  });

  Ext.define('SystemAsset.Cpgroup.store.ST_cpgroup', {
    extend  : 'Ext.data.Store',
    model   : 'SystemAsset.Cpgroup.model.M_cpgroup',
    autoLoad : true,
    autoSync: true,
    proxy: {
        type: 'ajax',
        actionMethods: 'POST',
        api: {
            create: base_url + 'cpgroup/create',
            read: base_url + 'cpgroup/read',
            update: base_url + 'cpgroup/update',
        },
        reader: {
            type: 'json',
            root: 'Rows',
            totalProperty: 'TotalRows',
            successProperty: 'success'
        },
        writer: {
            type: 'json',
            writeAllFields: false
        }
    }
  });
