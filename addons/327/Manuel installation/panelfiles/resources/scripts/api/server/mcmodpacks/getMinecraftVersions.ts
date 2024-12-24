import http from '@/api/http';

export default (uuid: string): Promise<any> => {
  return new Promise((resolve, reject) => {
    http
      .get(`/api/client/servers/${uuid}/mcmodpacks/mcversions`)
      .then(({ data }) => resolve(data))
      .catch(reject);
  });
};