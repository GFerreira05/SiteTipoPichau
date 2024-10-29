import { PropsWithChildren } from 'react';
import Stack from '@mui/material/Stack';
import Paper from '@mui/material/Paper';
import Link from '@mui/material/Link';
import ButtonBase from '@mui/material/ButtonBase';
import Typography from '@mui/material/Typography';
import Image from 'components/base/Image';
import Logo from 'assets/images/logo.png';

const AuthLayout = ({ children }: PropsWithChildren) => {
  return (
    <Stack
      component="main"
      alignItems="center"
      justifyContent="center"
      px={1}
      pt={12}
      pb={10}
      width={1}
      minHeight="100vh"
    >
      <ButtonBase
        component={Link}
        href="/"
        disableRipple
        sx=<?php echo e(position: 'absolute', top: 24, left: 24); ?>

      >
        <Image src={Logo} alt="logo" height={36} width={36} sx=<?php echo e(mr: 1.5); ?> />
        <Typography variant="h4" color="primary.main" letterSpacing={1}>
          VENUS
        </Typography>
      </ButtonBase>
      
    </Stack>
  );
};

export default AuthLayout;
<?php /**PATH C:\Users\si\Desktop\GG\pratico\resources\views/index.blade.php ENDPATH**/ ?>