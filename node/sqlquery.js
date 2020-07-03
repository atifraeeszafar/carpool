  module.exports = {

      "time_zone": "UTC",

      "get_setting_values": function() {

          return "SELECT * FROM settings";
      },

      "dispatcher_get_drivers": function(request) {

          var today = new Date(new Date().toLocaleString("en-US", { timeZone: request.time_zone }));
          var date = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate();
          var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
          var dateTime = date + ' ' + time;

          var driver_search_radious = 300;

          return "SELECT drivers.id,drivers.name,drivers.available,\
  drivers.vehicle_type,drivers.service_location_id,driver_details.\
  bearing,driver_details.latitude,driver_details.longitude,\
  vehicle_types.name as vehicle_type,ROUND(1 * 3956 * acos( \
  cos( radians(" + request.lat + ") ) *cos( radians(driver_details.latitude) \
  ) * cos( radians(driver_details.longitude) - radians(" + request.lng + ") )\
  + sin( radians(" + request.lat + ") )* sin( radians(driver_details.latitude)\
  ) ) ,8) as distance FROM drivers as drivers JOIN driver_details as \
  driver_details JOIN service_locations as service_locations \
  JOIN vehicle_types as vehicle_types  WHERE vehicle_types.id=drivers.vehicle_type\
  AND drivers.active = 1 AND drivers.approve=1 AND drivers.available=1 \
  AND drivers.id=driver_details.driver_id AND TIMESTAMPDIFF(MINUTE, \
  driver_details.updated_at,'" + dateTime + "') <= 5000000000000  AND \
  service_locations.id=drivers.service_location_id and \
  ROUND(1 * 3956 * acos(cos( radians(" + request.lat + ") ) \
  * cos( radians(driver_details.latitude) )* cos( \
  radians(driver_details.longitude) - radians(" + request.lng + ") \
  )+ sin( radians(" + request.lat + ") ) * sin( \
  radians(driver_details.latitude) ) ) ,8) <= " + driver_search_radious + " ORDER BY distance ASC LIMIT 20";
      },
      "select_zone_query": function(message) {

          var sql = "select * from `zones` where st_contains(`coordinates`, ST_GeomFromText(" +
              "'POINT(" + message.lng + " " + message.lat + ")'))";

          return sql;
      },
      "get_zone_types": function(id, message) {
          var sql = "SELECT  ( SELECT default_selected_type FROM zones WHERE id = '" + id + "') \
  as default_selected_type,zone_type.id,zone_type.type_id,type.name,type.icon,\
  type.is_accept_share_ride,zone_type.payment_type,\
  (SELECT CONCAT_WS(',',latitude,longitude) FROM driver_details detail,\
  drivers driver WHERE detail.driver_id IN (SELECT id FROM drivers d WHERE \
  d.vehicle_type=zone_type.type_id) AND driver.active=1 AND driver.available=1 \
  AND driver.approve =1 AND driver.id=detail.driver_id AND  ROUND(1 * 3956 *\
  acos( cos( radians('" + message.lat + "') )\
  * cos( radians(detail.latitude) ) * cos( radians(detail.longitude) -\
  radians('" + message.lng + "') ) + sin( radians('" + message.lat + "') )\
  * sin( radians(detail.latitude) ) ) ,8) < " + message.settings.config.driver_search_radius + "\
  ORDER BY  ROUND(1 * 3956 * acos( cos( radians('" + message.lat + "') ) * \
  cos( radians(detail.latitude) ) * cos( radians(detail.longitude) - \
  radians('" + message.lng + "') ) + sin( radians('" + message.lat + "') ) *\
  sin( radians(detail.latitude) ) ) ,8) asc LIMIT 1) as coordinate  FROM\
  zone_types as zone_type LEFT JOIN vehicle_types as type ON type.id=zone_type.type_id\
  WHERE zone_type.zone_id='" + id + "' AND zone_type.active=1 And zone_type.deleted_at\
  IS NULL  And type.deleted_at IS NULL LIMIT 20";
          return sql;
      },
      "get_drivers_near_location": function(input) {
          var sql = "select DISTINCT driver.id,IF(meta.id,true,false) as meta, ROUND(1 * 3956 *\
acos( cos( radians(" + input.lat + ") ) * cos( radians(ddetail.latitude) ) * \
cos( radians(ddetail.longitude) - radians(" + input.lng + ") ) + \
sin( radians(" + input.lat + ") ) * sin( radians(ddetail.latitude) ) ) ,8)\
as distance,ddetail.rating,driver.vehicle_type,ddetail.latitude,ddetail.longitude,\
ddetail.current_zone,ddetail.bearing from drivers driver \
left join requests_meta meta on meta.driver_id=driver.id and meta.active=1,\
zone_types zone_type,driver_details ddetail where driver.active =1 \
and driver.approve =1 and driver.available=1 and zone_type.zone_id =\
ddetail.current_zone and driver.id = ddetail.driver_id" + " and ROUND(1 * 3956 * acos( \
cos( radians(" + input.lat + ") ) *cos( radians(ddetail.latitude) ) *\
cos( radians(ddetail.longitude) -radians(" + input.lng + ") ) + \
sin( radians(" + input.lat + ") ) * sin( radians(ddetail.latitude) ) ) ,8)\
 <= " + input.settings.config.driver_search_radius + " ORDER BY distance ASC LIMIT 20";
          return sql;
      }
  }