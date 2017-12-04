  Ext.define('SystemAsset.Cpuser.model.M_cpuser', {
    extend: 'Ext.data.Model',
    fields: ['userID', 'userLogin', 'user_nik', 'userName', 'userLastlogin', 'userGroup', 'userPassword']
  });

  Ext.define('SystemAsset.Cpuser.store.ST_cpuser', {
    extend  : 'Ext.data.Store',
    model   : 'SystemAsset.Cpuser.model.M_cpuser',
    autoLoad : true,
    autoSync: true,
    proxy: {
        type: 'ajax',
        actionMethods: 'POST',
        api: {
            create: base_url + 'Cpuser/create',
            read: base_url + 'Cpuser/read',
            update: base_url + 'Cpuser/update'
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
