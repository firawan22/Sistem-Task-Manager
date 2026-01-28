import { Controller } from '@nestjs/common';
import { RabbitSubscribe } from '@golevelup/nestjs-rabbitmq';

@Controller()
export class AppController {
  @RabbitSubscribe({
    exchange: 'user-exchange',
    routingKey: 'user.created',
    queue: 'task-service-user-created',
  })
  handleUserCreated(data: any) {
    console.log('🔥 EVENT DITERIMA DI TASK SERVICE:', data);
  }
}
