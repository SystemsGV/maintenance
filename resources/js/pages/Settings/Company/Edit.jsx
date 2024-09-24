import ActionButton from '@/components/ActionButton';
import useForm from '@/hooks/useForm';
import ContainerBox from '@/layouts/ContainerBox';
import Layout from '@/layouts/MainLayout';
import { usePage } from '@inertiajs/react';
import {
  Box,
  Fieldset,
  FileInput,
  Grid,
  Group,
  Image,
  NumberInput,
  Select,
  Text,
  TextInput,
  Title,
} from '@mantine/core';

const CompanyEdit = () => {
  const {
    item,
    dropdowns: { countries, currencies },
  } = usePage().props;

  const [form, submit, updateValue] = useForm('post', route('settings.company.update'), {
    _method: 'put',
    logo: null,
    name: item.name || '',
    address: item.address || '',
    postal_code: item.postal_code || '',
    city: item.city || '',
    country_id: item.country_id || '',
    currency_id: item.currency_id || '',
    email: item.email || '',
    phone: item.phone || '',
    web: item.web || '',
    iban: item.iban || '',
    swift: item.swift || '',
    business_id: item.business_id || '',
    tax_id: item.tax_id || '',
    vat: item.vat || '',
    tax: item.tax / 100 || 0,
  });

  return (
    <>
      <Grid
        justify='space-between'
        align='flex-end'
        gutter='xl'
        mb={35}
      >
        <Grid.Col span='auto'>
          <Title order={1}>Mi empresa</Title>
        </Grid.Col>
        <Grid.Col span='content'></Grid.Col>
      </Grid>

      <ContainerBox maw={600}>
        <form onSubmit={e => submit(e, { forceFormData: true })}>
          <Grid
            justify='flex-start'
            align='center'
            gutter='lg'
          >
            <Grid.Col span='content'>
              {item.logo || form.data.logo ? (
                <Image
                  src={form.data.logo === null ? item.logo : URL.createObjectURL(form.data.logo)}
                  w={240}
                  h={64}
                />
              ) : (
                <Box
                  w={240}
                  h={64}
                  bg='#25262b'
                  align='center'
                  pt='lg'
                  opacity={0.6}
                >
                  Logo de la empresa
                </Box>
              )}
            </Grid.Col>
            <Grid.Col span='auto'>
              <FileInput
                label='Logo'
                placeholder='Cargar imagen'
                accept='image/png,image/jpeg'
                onChange={image => updateValue('logo', image)}
                clearable
                error={form.errors.logo}
                disabled={!can('editar mi empresa')}
              />
              <Text
                size='xs'
                c='dimmed'
                mt='sm'
              >
                240px &times; 64px (aspect 15:4)
              </Text>
            </Grid.Col>
          </Grid>

          <TextInput
            label='Nombre'
            placeholder='Nombre de la empresa'
            required
            mt='md'
            value={form.data.name}
            onChange={e => updateValue('name', e.target.value)}
            error={form.errors.name}
            disabled={!can('editar mi empresa')}
          />

          <Fieldset
            legend='Localización'
            mt='xl'
          >
            <TextInput
              label='Dirección'
              placeholder='Dirección'
              value={form.data.address}
              onChange={e => updateValue('address', e.target.value)}
              error={form.errors.address}
              disabled={!can('editar mi empresa')}
            />

            <Group grow>
              <TextInput
                label='Código postal'
                placeholder='Código postal'
                mt='md'
                value={form.data.postal_code}
                onChange={e => updateValue('postal_code', e.target.value)}
                error={form.errors.postal_code}
                disabled={!can('editar mi empresa')}
              />

              <TextInput
                label='Ciudad'
                placeholder='Ciudad'
                mt='md'
                value={form.data.city}
                onChange={e => updateValue('city', e.target.value)}
                error={form.errors.city}
                disabled={!can('editar mi empresa')}
              />
            </Group>

            <Select
              label='País'
              placeholder='Seleccionar país'
              mt='md'
              searchable={true}
              value={form.data.country_id?.toString()}
              onChange={value => updateValue('country_id', value)}
              data={countries}
              error={form.errors.country_id}
              disabled={!can('editar mi empresa')}
            />
          </Fieldset>

          <Fieldset
            legend='Detalles'
            mt='xl'
          >
            <TextInput
              label='Identificación comercial'
              placeholder='Identificación comercial'
              value={form.data.business_id}
              onChange={e => updateValue('business_id', e.target.value)}
              error={form.errors.business_id}
              disabled={!can('editar mi empresa')}
            />

            <TextInput
              label='Identificación fiscal'
              placeholder='Identificación fiscal'
              mt='md'
              value={form.data.tax_id}
              onChange={e => updateValue('tax_id', e.target.value)}
              error={form.errors.tax_id}
              disabled={!can('editar mi empresa')}
            />

            <TextInput
              label='VAT'
              placeholder='VAT'
              mt='md'
              value={form.data.vat}
              onChange={e => updateValue('vat', e.target.value)}
              error={form.errors.vat}
              disabled={!can('editar mi empresa')}
            />
          </Fieldset>

          <Fieldset
            legend='Finanzas'
            mt='xl'
          >
            <TextInput
              label='IBAN'
              placeholder='IBAN'
              value={form.data.iban}
              onChange={e => updateValue('iban', e.target.value)}
              error={form.errors.iban}
              disabled={!can('editar mi empresa')}
            />

            <TextInput
              label='SWIFT'
              placeholder='SWIFT'
              mt='md'
              value={form.data.swift}
              onChange={e => updateValue('swift', e.target.value)}
              error={form.errors.swift}
              disabled={!can('editar mi empresa')}
            />

            <Group grow>
              <Select
                label='Modena por defecto'
                placeholder='Seleccionar moneda'
                required
                mt='md'
                searchable={true}
                value={form.data.currency_id?.toString()}
                onChange={value => updateValue('currency_id', value)}
                data={currencies}
                error={form.errors.currency_id}
                disabled={!can('editar mi empresa')}
              />

              <NumberInput
                label='Impuesto IGV'
                required
                allowNegative={false}
                clampBehavior='strict'
                decimalScale={2}
                fixedDecimalScale={true}
                suffix='%'
                mt='md'
                value={form.data.tax}
                onChange={value => updateValue('tax', value)}
                error={form.errors.tax}
                disabled={!can('editar mi empresa')}
              />
            </Group>
          </Fieldset>

          <Fieldset
            legend='Contacto'
            mt='xl'
          >
            <Group grow>
              <TextInput
                label='Correo electrónico'
                placeholder='Correo electrónico'
                value={form.data.email}
                onChange={e => updateValue('email', e.target.value)}
                error={form.errors.email}
                disabled={!can('editar mi empresa')}
              />

              <TextInput
                label='Teléfono'
                placeholder='Teléfono'
                value={form.data.phone}
                onChange={e => updateValue('phone', e.target.value)}
                error={form.errors.phone}
                disabled={!can('editar mi empresa')}
              />
            </Group>

            <TextInput
              label='Sitio Web'
              placeholder='Sitio Web'
              mt='md'
              value={form.data.web}
              onChange={e => updateValue('web', e.target.value)}
              error={form.errors.web}
              disabled={!can('editar mi empresa')}
            />
          </Fieldset>

          <Group
            justify='flex-end'
            mt='xl'
          >
            {can('editar mi empresa') && (
              <ActionButton loading={form.processing}>Guardar</ActionButton>
            )}
          </Group>
        </form>
      </ContainerBox>
    </>
  );
};

CompanyEdit.layout = page => <Layout title='Editar empresa'>{page}</Layout>;

export default CompanyEdit;
